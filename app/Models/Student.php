<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Student extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;// add soft delete
    protected $fillable = [
        'classID',
        'studentID',
        'password',
        'fullName',
        'facultyName',
        'birthDate',
        'gender',
        'address',
        'phoneNumber',
        'avatar'
    ];

    public static function getCountStudentsToDivide($course, $faculty)
    {
        //ex: course: 2022
        // => strCourse: 22
        $strCourse = substr($course, -2, 2);

        if ($faculty !== 'all')
        {
            $sum = Student::where("studentID", "LIKE", "$strCourse%")
                ->where("facultyName", "=", (string) $faculty)
                ->whereNull("classID")
                ->count();
        }
        else
        {
            $sum = Student::where("studentID", "LIKE", "$strCourse%")
                ->whereNull("classID")
                ->count();
        }

        return $sum;
    }
}
