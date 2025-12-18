<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'college_id',
        'course_id',
        'name',
        'email',
        'contact_number',
        'department_id',
        'year_id',
        'section_id',
        'batch_number',
    ];

    public function college()
{
    return $this->belongsTo(College::class, 'college_id');
}

public function course()
{
    return $this->belongsTo(Course::class, 'course_id');
}
    public function department()
{
    return $this->belongsTo(department::class, 'department_id');
}

public function year()
{
    return $this->belongsTo(year::class, 'year_id');
}
public function section()
{
    return $this->belongsTo(section::class, 'section_id');
}
}
