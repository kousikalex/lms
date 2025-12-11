<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //
      protected $table = 'college'; // since table is not plural "colleges"

    protected $fillable = [
        'collegename',
        'Logo',
        'contact_person',
        'contact_number',
        'address',
        'landmark',
        'district',
        'state',
        'description',
    ];
}
