<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use App\Models\Faculty_Subject;
use App\Models\RegisterTeaching;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterTeachingController extends Controller
{
    public function index()
    {
        $facultyName = Auth::guard('teacher')->user()->faculty;
        $facultyID = Faculty::where('facultyName', '=', $facultyName)->first()->facultyID;
        $faculty_subjects = Faculty_Subject::where('facultyID', '=', $facultyID)->with('subject')->get();

        return view('user.teacher.register_teaching.index', [
            'faculty_subjects' => $faculty_subjects,
        ]);
    }

    public function register(Request $request): RedirectResponse
    {
        $schoolYear = $request->get('schoolYear');
        $semester = $request->get('semester');
        $subjectIDs = $request->get('subjectIDs');
        $numOfSections = $request->get('numOfSections');

        $teacherID = Auth::guard('teacher')->user()->teacherID;

        RegisterTeaching::registerTeaching(
            $schoolYear,
            $semester,
            $subjectIDs,
            $numOfSections,
            $teacherID
        );

        return redirect()->route('register_teachings.index')
            ->with('success', 'Register successful!');
    }
}
