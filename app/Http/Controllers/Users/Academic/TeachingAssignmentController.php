<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Imports\EmptyRoomsImport;
use App\Models\EmptyRoom;
use App\Models\Section;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class TeachingAssignmentController extends Controller
{
    public function index()
    {
        $sections = Section ::paginate(5);

        return view('user.academic.teaching_assignment.index', [
            'sections' => $sections,
        ]);
    }

    public function assignment()
    {
        $count = EmptyRoom ::count();

        return view('user.academic.teaching_assignment.assign', [
            'count' => $count,
        ]);
    }

    public function assign(Request $request)
    {
        $schoolYear = $request -> schoolYear;
        $semester = $request -> semester;

        Section ::handleAssignment($schoolYear, $semester);

        return redirect() -> route('user.academic.teaching_assignments.index') -> with('success', 'Assign successful');

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

}
