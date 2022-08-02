<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Faculty;
use App\Models\Subject;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class SubjectController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Subject();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' / ', $arr);
        View::share('title', $title);
    }

    public function index()
    {
        $subjects = $this->model->all();
        return view('subject.index', [
            'subjects' => $subjects,
        ]);
    }

    public function create()
    {
        $faculties = Faculty::all();
        return view('subject.create', [
            'faculties' => $faculties,
        ]);
    }

    public function store(StoreSubjectRequest $request)
    {
        // store data to subjects table
        $this->model->create($request->validated());

        // store data to factory_subject table
        $subject = Subject::where('subjectID', $request->subjectID)->first();
        $arrFacultyID = $request->faculties;
        $subject->faculties()->attach($arrFacultyID);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Inserted successful!');
    }

    public function show(Subject $subject)
    {

    }

    public function edit(Subject $subject)
    {
        $faculties = Faculty::all();
        return view('subject.edit', [
            'subject' => $subject,
            'faculties' => $faculties,
        ]);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        //delete data in faculty_subject table
        $subject2 = Subject::find($subject->id);
        $subject2->faculties()->detach();

        $subject->update($request->validated());

        // store data to factory_subject table
        $subject3 = Subject::where('subjectID', $request->subjectID)->first();
        $arrFacultyID = $request->faculties;
        $subject3->faculties()->attach($arrFacultyID);

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Updated successful!');
    }

    public function destroy(Subject $subject)
    {
        //delete data in faculty_subject table
        $subject2 = Subject::find($subject->id);
        $subject2->faculties()->detach();

        //delete data in subjects table
        $subject->delete();

        return redirect()->route('admin.subjects.index')
            ->with('success', 'Deleted successful!');
    }
}
