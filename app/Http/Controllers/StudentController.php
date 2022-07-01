<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Studentclass;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Student();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' / ', $arr);
        View::share('title', $title);
    }

    public function index()
    {
        return view('student.index');
    }

    public function api()
    {
        return Datatables::of($this->model->query())
            ->addColumn('edit', function ($object) {
                return route('admin.students.edit', $object);
            })
            ->addColumn('delete', function ($object) {
                return route('admin.students.destroy', $object);
            })
            ->make(true);
    }

    public function create()
    {
        $studentClasses = Studentclass::all();
        return view('student.create', [
            'studentClasses' => $studentClasses,
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        $array = $request->validated();
        $array['avatar'] = $path;
        $this->model->create($array);

        return redirect()->route('admin.students.index')->with('success', 'Inserted successful!');
    }

    public function show(Student $student)
    {

    }

    public function edit(Student $student)
    {
        $studentClasses = Studentclass::all();
        return view('student.edit', [
            'student' => $student,
            'studentClasses' => $studentClasses,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->route('admin.students.index')->with('success', 'Updated successful!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('admin.students.index')->with('success', 'Deleted successful!');
    }
}
