<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Faculty;
use App\Http\Requests\StoreFacultyRequest;
use App\Http\Requests\UpdateFacultyRequest;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

class FacultyController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Faculty();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' / ', $arr);
        View::share('title', $title);
    }

    public function index()
    {
        $faculties = $this->model->all();
        return view('faculty.index', [
            'faculties' => $faculties,
        ]);
    }


    public function create()
    {
        return view('faculty.create');
    }


    public function store(StoreFacultyRequest $request)
    {
        $this->model->create($request->validated());
        return redirect()->route('admin.faculties.index')->with('success', 'Inserted successful!');
    }

    public function show(Faculty $faculty)
    {
        //
    }


    public function edit(Faculty $faculty)
    {
        return view('faculty.edit', [
            'faculty' => $faculty,
        ]);
    }


    public function update(UpdateFacultyRequest $request, Faculty $faculty)
    {
        $faculty->update($request->validated());
        return redirect()->route('admin.faculties.index')->with('success', 'Updated successful!');
    }

    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
        return redirect()->route('admin.faculties.index')->with('success', 'Deleted successful!');
    }
}
