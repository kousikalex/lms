<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $table = 'attendance';
    protected $fillable = [
        'trainer_id',
        'date',
        'punch_in',
        'punch_out',
        'status',
    ];
}
