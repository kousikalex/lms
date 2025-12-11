<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allocate extends Model
{

     protected $table = 'allocate';
    //
    protected $fillable = [
        'college_id',
        'course_id',
        'trainer_id',
        'department_id',
        'year_id',
        'section_id',
        'description',
        'from_date',
        'to_date',
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
public function trainer()
{
    return $this->belongsTo(Trainer::class, 'trainer_id');
}
}
