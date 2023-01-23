<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('user.academic.attendance.index', [
            'subjects' => $subjects
        ]);
    }

    public function getLesson(Request $request)
    {
//        $subjectID = $request->subjectID;
        $subjectID = 'LTPHP1';
        $section = Section::select(['sectionID', 'beginDate', 'shift', 'teacherID'])
            ->where('subjectID', $subjectID)
            ->orderBy('beginDate')
            ->orderBy('shift')
            ->get();
        foreach ($section as $key => $value) {
            $value->beginDate = date('l', strtotime($value->beginDate));
        }
        return response()->json($section);
    }
}
