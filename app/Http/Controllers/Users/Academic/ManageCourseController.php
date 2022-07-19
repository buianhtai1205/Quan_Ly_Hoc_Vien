<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class ManageCourseController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Course();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' / ', $arr);
        View::share('title', $title);
    }

    public function index()
    {
        $courses = $this->model->all();
        return view('user.academic.manage_course.index', [
            'courses' => $courses,
        ]);
    }


    public function create()
    {
        return view('user.academic.manage_course.create');
    }

    public function store(StoreCourseRequest $request)
    {
        $this->model->create($request->validated());
        return redirect()
            ->route('manage_courses.index')
            ->with('success', 'Inserted successfull!');
    }


    public function show(Course $course)
    {

    }


    public function edit(Course $course)
    {
        return view('user.academic.manage_course.edit', [
            'course' => $course,
        ]);
    }


    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());
        return redirect()
            ->route('manage_courses.index')
            ->with('success', 'Updated successfull!');
    }


    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()
            ->route('manage_courses.index')
            ->with('success', 'Deleted successfull!');
    }
}
