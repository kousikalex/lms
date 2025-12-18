<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentAttendance extends Model
{
    //
      protected $fillable = [
        'student_id',
        'batch_name',
        'attendance_date',
        'attendance'
    ];
}
