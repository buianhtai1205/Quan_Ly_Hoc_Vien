<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Imports\EducationProgramsImport;
use App\Models\Course;
use App\Models\EducationProgram;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ManageEducationProgram extends Controller
{
    public function index(Request $request)
    {
        $courses = Course::all();
        $faculties = Faculty::all();

        $courseID = $request->get('courseID') ?? '';
        $facultyID = $request->get('facultyID') ?? '';
        $semester = $request->get('semester') ?? '';
        $education_programs = EducationProgram::all()
            ->where('courseID', 'LIKE', $courseID)
            ->where('facultyID', 'LIKE', $facultyID)
            ->where('semester', 'LIKE', $semester);

        return view('user.academic.manage_education_program.index', [
            'courses' => $courses,
            'faculties' => $faculties,
            'education_programs' => $education_programs,
            'courseIDOld' => $courseID,
            'facultyIDOld' => $facultyID,
            'semesterOld' => $semester,
        ]);
    }

    public function importCsv(Request $request)
    {
        try {
            Excel::import(new EducationProgramsImport(), $request->file);
            return 1;
        } catch (Exception $e) {
        }
    }
}
