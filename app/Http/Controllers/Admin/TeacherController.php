<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Teacher();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' / ', $arr);
        View::share('title', $title);
    }
    public function index()
    {
        return view('admin.teacher.index');
    }

    public function api()
    {
        return Datatables::of($this->model->query())
            ->addColumn('edit', function ($object) {
                return route('admin.teachers.edit', $object);
            })
            ->addColumn('delete', function ($object) {
                return route('admin.teachers.destroy', $object);
            })
            ->make(true);
    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        $hashPassword = Hash::make($request->password);
        $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        $array = $request->validated();
        $array['avatar'] = $path;
        $array['password'] = $hashPassword;
        $this->model->create($array);

        return redirect()->route('admin.teachers.index')->with('success', 'Inserted successful!');
    }


    public function show(Teacher $teacher)
    {
        //
    }


    public function edit(Teacher $teacher)
    {
        return view('admin.teacher.edit', [
            'teacher' => $teacher,
        ]);
    }


    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $hashPassword = Hash::make($request->password);
        $array = $request->validated();
        $array['password'] = $hashPassword;
        $teacher->update($array);
        return redirect()->route('admin.teachers.index')->with('success', 'Updated successful!');
    }


    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('admin.teachers.index')->with('success', 'Deleted successful!');
    }
}
