<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcourse extends Model
{
    //
      protected $fillable = [
        "course_id",
        "name",
        "image",
        "description",

    ];

    public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}
}
