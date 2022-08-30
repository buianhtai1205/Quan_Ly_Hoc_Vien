<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Imports\EmptyRoomsImport;
use App\Jobs\ProcessAddStudentsToSections;
use App\Jobs\ProcessGenerateAttendances;
use App\Models\EducationProgram;
use App\Models\EmptyRoom;
use App\Models\Section;
use App\Models\Section_Student;
use App\Models\Studentclass;
use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class TeachingAssignmentController extends Controller
{
    public function index()
    {
        $sections = Section ::where('status', 1)->paginate(5);
        $count = Section ::whereNull('teacherID')->count();
        $countSectionNotAccept = Section ::where('status', 0)->count();
        $countSectionNotBrowse = Section ::where('status', 1)->count();

        return view('user.academic.teaching_assignment.index', [
            'sections' => $sections,
            'count' => $count,
            'countSectionNotAccept' => $countSectionNotAccept,
            'countSectionNotBrowse' => $countSectionNotBrowse,
        ]);
    }

    public function assignment()
    {
        $count = EmptyRoom ::count();

        return view('user.academic.teaching_assignment.assign', [
            'count' => $count,
        ]);
    }

    public function assign(Request $request): RedirectResponse
    {
        $schoolYear = $request -> schoolYear;
        $semester = $request -> semester;

        Section ::handleAssignment($schoolYear, $semester);

        return redirect()
            -> route('teaching_assignments.index')
            -> with('success', 'Assign successful');

    }

    public function importCsvRoom(Request $request)
    {
        try {
            Excel ::import(new EmptyRoomsImport, $request -> file);
            return 1;
        } catch (Exception $e) {
            return $e;
        }
    }

    public function browse(): RedirectResponse
    {
        //b1: get arrayResult
        $arrayResult = [];
        $indexArrayResult = 0;
        $arrayResult = Section ::getArraySectionAndClass($arrayResult, $indexArrayResult);

        //b2: handle arrayResult
        //b2.1: create array check
        $arrayCheck = Section_Student::createArrayCheck($arrayResult, $indexArrayResult);

        //b2.2: add class to section
        $arraySection = Section_Student::createArraySection($arrayResult, $arrayCheck, $indexArrayResult);

        // queue: add studentID and sectionID to section_student
        ProcessAddStudentsToSections::dispatch($arraySection);

        // queue: create Attendance
        ProcessGenerateAttendances::dispatch();

        return redirect()
            -> route('teaching_assignments.index')
            -> with('success', 'Browse successful!');
    }

}
