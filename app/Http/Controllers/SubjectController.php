<?php

namespace App\Http\Controllers;

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
        return view('subject.create');
    }

    public function store(StoreSubjectRequest $request)
    {
        $this->model->create($request->validated());
        return redirect()->route('admin.subjects.index')->with('success', 'Inserted successful!');
    }

    public function show(Subject $subject)
    {

    }

    public function edit(Subject $subject)
    {
        return view('subject.edit', [
            'subject' => $subject,
        ]);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());
        return redirect()->route('admin.subjects.index')->with('success', 'Updated successful!');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('admin.subjects.index')->with('success', 'Deleted successful!');
    }
}
