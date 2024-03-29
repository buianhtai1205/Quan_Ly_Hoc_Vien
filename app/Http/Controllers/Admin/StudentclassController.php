<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Faculty;
use App\Models\Studentclass;
use App\Http\Requests\StoreStudentclassRequest;
use App\Http\Requests\UpdateStudentclassRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class StudentclassController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = new Studentclass();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' / ', $arr);
        View::share('title', $title);
    }

    public function index()
    {
        $studentClasses = $this->model->all();
        return view('admin.studentClass.index', [
            'studentClasses' => $studentClasses,
        ]);
    }

    public function create()
    {
        $courses = Course::all();
        $faculties = Faculty::all();
        return view('admin.studentClass.create', [
            'courses' => $courses,
            'faculties' => $faculties,
        ]);
    }


    public function store(StoreStudentclassRequest $request)
    {
        $this->model->create($request->validated());
        return redirect()->route('admin.studentClasses.index')->with('success', 'Inserted successful!');
    }


    public function show(Studentclass $studentclass)
    {

    }


    public function edit(Studentclass $studentClass)
    {
        $courses = Course::all();
        $faculties = Faculty::all();
        return view('admin.studentClass.edit', [
            'studentClass' => $studentClass,
            'courses' => $courses,
            'faculties' => $faculties,
        ]);
    }


    public function update(UpdateStudentclassRequest $request, Studentclass $studentClass)
    {
        $studentClass->update($request->validated());
        return redirect()->route('admin.studentClasses.index')->with('success', 'Updated successful!');
    }


    public function destroy(Studentclass $studentClass)
    {
        $studentClass->delete();
        return redirect()->route('admin.studentClasses.index')->with('success', 'Deleted successful!');
    }
}
