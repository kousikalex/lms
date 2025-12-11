<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    //
     protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'emergency_name',
        'emergency_number',
        'account_number',
        'experience',
        'trainer_type',
        'file_upload'
    ];
}
