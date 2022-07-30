<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Studentclass extends Model
{
    use HasFactory;
    use Notifiable,
        SoftDeletes;

    // add soft delete
    protected $fillable
        = [
            'classID',
            'courseID',
            'facultyID',
            'className',
        ];

    public static function createManyStudentClass(
        $numClass,
        $strCourse,
        $courseID,
        $facultyID,
        &$arrayClassID
    ): void {
        $char = "A";
        $maxIDCurrent = self ::max('id') ?? 0;

        for ($i = 0; $i < $numClass; $i++) {
            $intCourse = (int) $strCourse;
            // create ID for class, ex: 210001A, 210001B,...
            $classID = ($intCourse * 100000 + $maxIDCurrent + 1) . $char;
            $className = "Lớp " . $classID;

            self ::create([
                'classID' => $classID,
                'className' => $className,
                'courseID' => $courseID,
                'facultyID' => $facultyID,
            ]);

            // save classID into array to divide
            $arrayClassID[$i] = $classID;

            // increase char to create class ...A, ...B, .....
            $char++;
        }
    }

    public static function divideStudentsToClasses($students, $arrayClassID): void
    {
        $index = 0;
        foreach ($students as $student) {
            $student -> classID = $arrayClassID[$index];
            $student -> save();
            $index++;
            if ($index === count($arrayClassID)) {
                $index = 0;
            }
        }
    }

    public static function handleDivideOneFaculty($numClass, $course, $faculty): void
    {
        $strCourse = substr($course, -2, 2);

        // get list students according to faculty and course
        $students = Student ::where("studentID", "LIKE", "$strCourse%")
            -> where("facultyName", "=", (string) $faculty)
            -> whereNull("classID")
            -> get();

        // get facultyID from facultyName
        $facultyID = Faculty ::where("facultyName", "=", $faculty) -> first() -> facultyID;

        // create array class to save classID
        $arrayClassID = [];

        // create num class
        self ::createManyStudentClass(
            $numClass,
            $strCourse,
            $course,
            $facultyID,
            $arrayClassID,
        );

        // divide
        self ::divideStudentsToClasses($students, $arrayClassID);
    }

    public static function handleDivideAllFaculty($numClass, $course): void
    {
        $listFaculty = Faculty::all();
        foreach ($listFaculty as $faculty)
        {
            self::handleDivideOneFaculty($numClass, $course, $faculty->facultyName);
        }
    }

    public static function handleDivide($numClass, $course, $faculty): void
    {
        if ($faculty !== 'all') {
            self ::handleDivideOneFaculty($numClass, $course, $faculty);
        } else {
            self ::handleDivideAllFaculty($numClass, $course);
        }
    }
}
