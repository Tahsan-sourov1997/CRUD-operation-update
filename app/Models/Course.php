<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['course_name','course_duration','course_type','student_id' ];

    public function students()
    {
        return $this->hasMany(Student::class,'student_id','id');
    }

    

}

    

