<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class GuestList extends Model
{
    protected $table      = 'guest_list';
    protected $primaryKey = 'invitation_code';
    public    $hidden     = ['invitation_code'];
    public    $guarded    = [];
    public    $timestamps = false;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    // public function getCommentAttribute($value)
    // {
    //     return nl2br($value);
    // }
}
