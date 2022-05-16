<?php

namespace App\Http\Controllers;

use App\Models\GuestList;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestBookController extends Controller
{
    public function list()
    {
        return GuestList::latest()->paginate(3);
    }

    public function getUserData()
    {
        return GuestList::where('invitation_code', request('invitation_code'))->first();
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
