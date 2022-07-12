<?php

namespace App\Http\Controllers;

use App\Models\GuestList;
use App\Models\Comments;
use Illuminate\Http\Request;
use App\Helpers\UtilityHelper;
use App\Mail\Rsvp;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendEmailNotification;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuestListImport;

class GuestListController extends Controller
{
    // public function list()
    // {
    //     return GuestList::latest()->paginate(3);
    // }

    public function getUserData(Request $request)
    {
        return GuestList::where('invitation_code', $request->invitation_code)->first();
    }

    public function store(Request $request)
    {
        $invitation_code = UtilityHelper::generateInvitationCode();
        $guest = GuestList::create([
            'invitation_code' => $invitation_code,
            'guest_name' => $request->guest_name,
            'attendance_type' => $request->attendance_type,
            'max_attendance' => $request->max_attendance,
            'enable_edit_name' => $request->enable_edit_name == null ? '0' : strval($request->enable_edit_name),
        ]);

        return $guest;
    }

    public function rsvp(Request $request)
    {
        $rsvp = GuestList::find($request->invitation_code);
        $response = [];
        try {
            $rsvp->update(['rsvp' => $request->rsvp, 'number_of_attendance' => $request->rsvp == "yes" ? $request->number_of_attendance : 0]);
            $comment = Comments::create([
                'comment_from' => $rsvp->guest_name,
                'comment_text' => $request->comment_text
            ]);
            $fetchLatestComment = Comments::find($comment->id);
            $response['data']['rsvp'] = $rsvp;
            $response['data']['comment'] = $fetchLatestComment;
            $response['data']['email'] = $this->sendMail($rsvp);
        } catch (\Throwable $th) {
            $response['errors'] = $th->getMessage();
        } finally {
            return json_encode($response);
        }
    }

    public function updateUserData(Request $request)
    {
        // dd($request->all());
        $guest = GuestList::find($request->invitation_code);
        $response = [];
        try {
            $guest->update([
                "guest_name" => $request->guest_name,
                "attendance_type" => $request->attendance_type,
                "rsvp" => $request->rsvp == '-' ? null : $request->rsvp,
                "number_of_attendance" => $request->number_of_attendance,
                "max_attendance" => $request->max_attendance,
                "enable_edit_name" => $request->enable_edit_name
            ]);
            $response['guest'] = $guest;
        } catch (\Throwable $th) {
            $response['errors'] = $th->getMessage();
        }

        return json_encode($response);
    }

    public function delete(Request $request)
    {
        $guest = GuestList::where('invitation_code', $request->invitation_code)->firstOrFail();
        $response = [];
        try {
            $guest->delete();

            $response['guest'] = $guest;
        } catch (\Throwable $th) {
            $response['errors'] = $th->getMessage();
        }

        return json_encode($guest);
    }

    public function sendMail($data)
    {

        try {
            $emailJobs = new SendEmailNotification($data);
            $this->dispatch($emailJobs);
            return
                [
                    'success' => true,
                    'message' => "Email notification added to queue!"
                ];
        } catch (\Throwable $th) {
            return
                [
                    'success' => false,
                    'message' => $th->getMessage()
                ];
        }
    }

    public function guestBook()
    {
        return view('guest_book');
    }

    public function importGuestList(Request $request)
    {
        // $file_location = storage_path('app/public') . '/Guest List.csv';
        $response = [];

        try {
            if($request->clear_data == 'true'){
                GuestList::truncate();
            }
            Excel::import(new GuestListImport, $request->file('image'));
            $response['import'] = 'success';
            // $array = Excel::toArray(new GuestListImport, $file_location);
        } catch (\Throwable $th) {
           $response['errors'] = $th->getMessage();
        }
        
        return $response;
    }
}
