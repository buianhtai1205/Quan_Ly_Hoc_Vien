<?php

namespace App\Http\Controllers\Users\Teacher;

use App\Http\Controllers\Controller;
use App\Models\EmptyRoom;
use App\Models\Section;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AcceptAssignmentController extends Controller
{
    public function index()
    {
        $teacherID = Auth::guard('teacher')->user()->teacherID;
        $sections = Section::where('teacherID', $teacherID)
            ->where('status', 0)
            ->orderBy('beginDate')
            ->orderBy('shift')
            ->get();
        $dates = EmptyRoom::select('beginDate')->groupBy('beginDate')->get();

        return view('user.teacher.accept_assignment.index', [
            'sections' => $sections,
            'dates' => $dates
        ]);
    }

    public function apiRoom(Request $request): JsonResponse
    {
        $beginDate = $request->beginDate ?? '';
        $rooms = EmptyRoom::select('roomName')
            ->where('beginDate', 'LIKE', $beginDate)
            ->where('status', 0)
            ->groupBy('roomName')
            ->get();
        return response()->json($rooms);
    }

    public function apiShift(Request $request): JsonResponse
    {
        $beginDate = $request->beginDate ?? '';
        $roomName = $request->roomName ?? '';
        $rooms = EmptyRoom::select('shift')
            ->where('beginDate', 'LIKE', $beginDate)
            ->where('roomName', 'LIKE', $roomName)
            ->where('status', 0)
            ->groupBy('shift')
            ->get();
        return response()->json($rooms);
    }

    public function update(Request $request): RedirectResponse
    {
        $sectionID = $request->sectionID;
        $beginDateOld = $request->beginDateOld;
        $roomNameOld = $request->roomNameOld;
        $shiftOld = $request->shiftOld;
        $beginDate = $request->beginDate;
        $roomName = $request->roomName;
        $shift = $request->shift;

        Section::where('sectionID', $sectionID)
            ->where('status', 0)
            ->update([
                'beginDate' => $beginDate,
                'room' => $roomName,
                'shift' => $shift
            ]);
        EmptyRoom::where('roomName', $roomName)
            ->where('beginDate', $beginDate)
            ->where('shift', $shift)
            ->update([
                'status' => 1
            ]);
        EmptyRoom::where('roomName', $roomNameOld)
            ->where('beginDate', $beginDateOld)
            ->where('shift', $shiftOld)
            ->update([
                'status' => 0
            ]);

        return redirect()->route('accept_assignments.index')
            ->with('success', 'Updated successfully');
    }

    public function accept(): RedirectResponse
    {
        $teacherID = Auth::guard('teacher')->user()->teacherID;
        Section::where('teacherID', $teacherID)
            ->where('status', 0)
            ->orderBy('beginDate')
            ->orderBy('shift')
            ->update([
                'status' => 1
            ]);
        return redirect()->route('accept_assignments.index')
            ->with('success', 'Accepted successfully');
    }
}

