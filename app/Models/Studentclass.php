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
        SoftDeletes;// add soft delete
    protected $fillable = [
        'classID',
        'courseID',
        'facultyID',
        'className',
    ];

    public function createManyStudentClass($numClass, $strCourse, $courseID, $facultyID, &$arrayClassID) : void
    {
        $char = "A";
        $maxIDCurrent = self::max('id') ?? 0;

        for ($i = 0; $i < $numClass; $i++)
        {
            $intCourse = (int)$strCourse;
            // create ID for class, ex: 210001A, 210001B,...
            $classID = ($intCourse * 100000 + $maxIDCurrent + 1) . $char;
            $className = "Lớp " . $classID;

            self::create([
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

    public function divideStudentsToClasses($students, $arrayClassID) : void
    {
        $index = 0;
        foreach ($students as $student)
        {
            $student->classID = $arrayClassID[$index];
            $student->save();
            $index++;
            if ($index === count($arrayClassID)) {
                $index = 0;
            }
        }
    }
}
