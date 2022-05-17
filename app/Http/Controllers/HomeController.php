<?php

namespace App\Http\Controllers;

use App\Models\GuestList;
use App\Models\Comments;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if (!$request->has('invitation_code') || empty($request->invitation_code) || empty(GuestList::find($request->invitation_code))) {
            return abort(404, "Invalid invitation code.<br>Check for typos, or ask the bride and groom for your invitation code.");
        }
        $guest = GuestList::find($request->invitation_code);
        $comments = Comments::latest()->paginate(10);
        $comments->withPath('/comments');
        return view('home', ['guest' => $guest, 'comments' => $comments]);
    }

    public function store(Request $request)
    {
        $invitation_code = $this->generateInvitationCode();
        $newGuest = GuestList::create($request->only(['name', 'presence', 'person', 'comment']));

        return $newGuest;
    }

    public function generateInvitationCode(){
        do {
            $invitation_code = Str::random(5);

        } while (GuestList::where('invitation_code', $invitation_code )->exists());

        return $invitation_code;
    }
}
