<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use App\Helpers\UtilityHelper;
use DNS2D;

class GuestList extends Model
{
    protected $table      = 'guest_list';
    protected $primaryKey = 'invitation_code';
    protected $keyType    = 'string';
    protected $attributes = [
        'rsvp' => null,
        'number_of_attendance' => 0
    ];
    protected $appends = ['qr_code'];

    public    $hidden     = [];
    public    $guarded    = [];
    public    $timestamps = true;
    public    $incrementing = false;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getQrCodeAttribute()
    {
        return DNS2D::getBarcodePNG("https://lutfiandvira.wedding/{$this->attributes['invitation_code']}", 'QRCODE', 7,7);
    }

    // public function getCommentAttribute($value)
    // {
    //     return nl2br($value);
    // }
}
