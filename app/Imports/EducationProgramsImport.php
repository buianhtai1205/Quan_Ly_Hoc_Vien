<?php

namespace App\Imports;

use App\Models\EducationProgram;
use Maatwebsite\Excel\Concerns\ToArray;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EducationProgramsImport implements ToArray, WithHeadingRow
{
    public function array(array $array) : void
    {
        try
        {
            foreach ($array as $each)
            {
                $courseID = $each['courseid'];
                $facultyID = $each['facultyid'];
                $semester = $each['semester'];
                $subjectName = $each['subjectname'];

                EducationProgram::create([
                    'courseID' => $courseID,
                    'facultyID' => $facultyID,
                    'semester' => $semester,
                    'subjectName' => $subjectName,
                ]);
            }
        }
        catch(Exception $e)
        {
            dd($each);
        }
    }
}
