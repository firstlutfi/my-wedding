<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\UtilityHelper;

class GuestList extends Model
{
    protected $table      = 'guest_list';
    protected $primaryKey = 'invitation_code';
    protected $keyType    = 'string';
    protected $attributes = [
        'rsvp' => null,
        'number_of_attendance' => 0
    ];

    public    $hidden     = [];
    public    $guarded    = [];
    public    $timestamps = false;
    public    $incrementing = false;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    // public function getCommentAttribute($value)
    // {
    //     return nl2br($value);
    // }
}
