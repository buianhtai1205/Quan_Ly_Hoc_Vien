<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Studentclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ManageStudentController extends Controller
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
        $courses = Course::all();
        $faculties = Faculty::all();
        return view('user.academic.manage_student.index', [
            'courses' => $courses,
            'faculties' => $faculties,
        ]);
    }

    public function api(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->model->select('*');
            return Datatables::of($data)
                ->addColumn('edit', function ($object) {
                    return route('manage_students.edit', $object);
                })
                ->addColumn('delete', function ($object) {
                    return route('manage_students.destroy', $object);
                })
                ->filter(function ($instance) use ($request) {
                    $course = $request->get('course');
                    $faculty = $request->get('faculty') ?? "";
                    $strCourse = substr($course, -2, 2);
                    $instance->where("studentID", "LIKE", "$strCourse%");
                    if ($faculty !== '')
                    {
                        $instance->where("facultyName", "=", (string) $faculty);
                    }
                })
                ->make(true);
        }
    }

    public function importCsv(Request $request)
    {
        try {
            Excel::import(new StudentsImport, $request->file);
            return 1;
        }
        catch (Exception $e) {
        }
    }

    public function create()
    {
        $studentClasses = Studentclass::all();
        return view('user.academic.manage_student.create', [
            'studentClasses' => $studentClasses,
        ]);
    }

    public function store(StoreStudentRequest $request)
    {
        $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        $array = $request->validated();
        $array['avatar'] = $path;
        $this->model->create($array);

        return redirect()->route('manage_students.index')->with('success', 'Inserted successful!');
    }

    public function show(Student $student)
    {

    }

    public function edit(Student $student)
    {
        $studentClasses = Studentclass::all();
        return view('user.academic.manage_student.edit', [
            'student' => $student,
            'studentClasses' => $studentClasses,
        ]);
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        return redirect()->route('manage_students.index')->with('success', 'Updated successful!');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('manage_students.index')->with('success', 'Deleted successful!');
    }
}
