<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Models\GuestList;

class UtilityHelper
{
    public static function generateInvitationCode(){
        do {
            $invitation_code = Str::random(5);

        } while (GuestList::where('invitation_code', $invitation_code )->exists());

        return $invitation_code;
    }

    public static function setNameInitial($comment_from){
        $exploded = explode(' ', $comment_from, 2);
        if (count($exploded) == 1){
            return $exploded[0][0];
        }

        return strtoupper($exploded[0][0].$exploded[1][0]);
    }
}
