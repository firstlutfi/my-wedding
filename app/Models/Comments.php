<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table      = 'comments';
    protected $primaryKey = 'id';
    public    $hidden     = ['id'];
    public    $guarded    = [];
    public    $timestamps = false;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans(null, true) . ' yang lalu';
    }

    // public function getCommentAttribute($value)
    // {
    //     return nl2br($value);
    // }
}
