<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Models\Section;
use Illuminate\Http\Request;


class TeachingAssignmentController extends Controller
{

    public function getInfoAssignment()
    {
        $listSubjects = Section::whereNull('teacherID')
            ->orWhereNull('shift')->orWhereNull('room')->orWhereNull('beginDate')
            ->select('subjectID')->groupBy('subjectID')->get();
        return view('user.academic.teaching_assignment.getInfoAssignment', [
            'listSubjects' => $listSubjects,
        ]);
    }

    public function index(Request $request)
    {
        // get list section to assignment
        $subjectID = $request->get('subjectID');
        $sections = Section::all()->whereNull('teacherID')
            ->whereNull('shift')->whereNull('beginDate')->whereNull('room');

        if ($subjectID !== 'all')
        {
            $sections = $sections -> where('subjectID', '=', $subjectID);
        }

        //get list teacher belong to faculty has subject in section



        return view('user.academic.teaching_assignment.index', [
            'sections' => $sections,
        ]);
    }

    public function assignment(): void
    {

    }
}
