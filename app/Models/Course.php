<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
     protected $fillable = [
        "name",
        "image",
        "description",
        "duriation",
    ];

    public function subcourses()
{
    return $this->hasMany(Subcourse::class);
}
}
