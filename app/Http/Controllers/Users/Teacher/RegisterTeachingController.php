<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreRegisterTeachingRequest;
use App\Http\Requests\UpdateRegisterTeachingRequest;
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
        $teacherID = Auth::guard('teacher')->user()->teacherID;
        $register_teachings = RegisterTeaching::where('teacherID', $teacherID)->get();

        return view('user.teacher.register_teaching.index', [
            'register_teachings' => $register_teachings,
        ]);
    }

    public function create()
    {
        $facultyName = Auth::guard('teacher')->user()->faculty;
        $facultyID = Faculty::where('facultyName', '=', $facultyName)->first()->facultyID;
        $faculty_subjects = Faculty_Subject::where('facultyID', '=', $facultyID)->with('subject')->get();

        return view('user.teacher.register_teaching.create', [
            'faculty_subjects' => $faculty_subjects,
        ]);
    }

    public function store(StoreRegisterTeachingRequest $request): RedirectResponse
    {
        $schoolYear = $request->get('schoolYear');
        $semester = $request->get('semester');
        $subjectIDs = $request->get('subjectIDs');
        $numOfSections = $request->get('numOfSections');

        $teacherID = Auth::guard('teacher')->user()->teacherID;


//        dd($request->all());

        RegisterTeaching::registerTeaching(
            $schoolYear,
            $semester,
            $subjectIDs,
            $numOfSections,
            $teacherID,
        );

        return redirect()->route('register_teachings.index')
            ->with('success', 'Register successful!');
    }

    public function edit(Request $request)
    {
        $teacherID = Auth::guard('teacher')->user()->teacherID;
        $subjectID = $request->subjectID;
        $register_teaching = RegisterTeaching::where('teacherID', $teacherID)
            ->where('subjectID', $subjectID)
            ->first();
        return view('user.teacher.register_teaching.edit', [
            'register_teaching' => $register_teaching,
        ]);
    }


    public function update(UpdateRegisterTeachingRequest $request)
    {
        $teacherID = Auth::guard('teacher')->user()->teacherID;
        $subjectID = $request->subjectID;
        $register_teaching = RegisterTeaching::where('teacherID', $teacherID)
            ->where('subjectID', $subjectID);
        $register_teaching->update([
            'numOfSection' => $request->numOfSection,
            'schoolYear' => $request->schoolYear,
            'semester' => $request->semester,
        ]);
        return redirect()->route('register_teachings.index')
            ->with('success', 'Updated successful!');
    }


    public function destroy(Request $request)
    {
        $teacherID = Auth::guard('teacher')->user()->teacherID;
        $subjectID = $request->subjectID;
        RegisterTeaching::where('teacherID', $teacherID)
            ->where('subjectID', $subjectID)
            ->delete();
        return redirect()->route('register_teachings.index')
            ->with('success', 'Deleted successful!');
    }
}
