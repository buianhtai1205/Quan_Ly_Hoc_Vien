<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Section;
use App\Models\Section_Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherAttendanceController extends Controller
{
    public function selectClassroom()
    {
        $teacherID = Auth::guard('teacher')->user()->teacherID;

        $subjects = Section::select('subjectID')
            ->where('teacherID', $teacherID)
            ->distinct()->get();

        return view('user.teacher.teacher_attendance.select_classroom', [
            'subjects' => $subjects
        ]);
    }

    public function apiSection(Request $request)
    {
        $teacherID = Auth::guard('teacher')->user()->teacherID;
        $subjectID = $request->subjectID;

        $sections = Section::select(['sectionID', 'beginDate', 'shift'])
            ->where('teacherID', $teacherID)
            ->where('subjectID', $subjectID)
            ->get();
        foreach($sections as $section) {
            $section->beginDate = date('l', strtotime($section->beginDate));
        }

        return response()->json($sections);
    }

    public function apiWeek(Request $request)
    {
        $sectionID = $request->sectionID;

        $student = Section_Student::select('id')
            ->where('sectionID', $sectionID)
            ->first();
        $dates = Attendance::where('section_student_id', $student->id)
            ->select('date')
            ->get();

        return response()->json($dates);

    }

    public function index(Request $request)
    {
        $sectionID = $request->sectionID;
        $date = $request->date;

        $students = Section_Student::select(['id', 'studentID'])
            ->where('sectionID', $sectionID)
            ->get();

        return view('user.teacher.teacher_attendance.index', [
            'students' => $students,
            'date' => $date,
            'sectionID' => $sectionID
        ]);
    }

    public function attendance(Request $request)
    {
        $date = $request->date;
        $statuses = $request->statuses;
        $sectionID = $request->sectionID;

        foreach ($statuses as $studentID => $status)
        {
            $id = Section_Student::select('id')
                ->where('sectionID', $sectionID)
                ->where('studentID', $studentID)
                ->first();

            Attendance::where('section_student_id', $id->id)
                ->where('date', $date)
                ->update(['status' => $status]);
        }

        return redirect()
            ->route('teacher.attendances.select_classroom')
            ->with('success', 'Attendance successfully!');

    }

}
