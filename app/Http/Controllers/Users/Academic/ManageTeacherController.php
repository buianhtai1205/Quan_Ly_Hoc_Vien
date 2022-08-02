<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Imports\TeachersImport;
use App\Models\Teacher;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ManageTeacherController extends Controller
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
        return view('user.academic.manage_teacher.index');
    }

    public function api()
    {
        return Datatables::of($this->model->query())
            ->addColumn('edit', function ($object) {
                return route('manage_teachers.edit', $object);
            })
            ->addColumn('delete', function ($object) {
                return route('manage_teachers.destroy', $object);
            })
            ->make(true);
    }

    public function importCsv(Request $request)
    {
        try {
            Excel::import(new TeachersImport, $request->file);
            return 1;
        }
        catch (Exception $e) {
        }
    }

    public function create()
    {
        return view('user.academic.manage_teacher.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        $hashPassword = Hash::make($request->password);
        $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        $array = $request->validated();
        $array['avatar'] = $path;
        $array['password'] = $hashPassword;
        $this->model->create($array);

        return redirect()->route('manage_teachers.index')->with('success', 'Inserted successful!');
    }


    public function show(Teacher $teacher)
    {
        //
    }


    public function edit(Teacher $teacher)
    {
        return view('user.academic.manage_teacher.edit', [
            'teacher' => $teacher,
        ]);
    }


    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $hashPassword = Hash::make($request->password);
        $array = $request->validated();
        $array['password'] = $hashPassword;
        $teacher->update($array);
        return redirect()->route('manage_teachers.index')
            ->with('success', 'Updated successfull!');
    }


    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->route('manage_teachers.index')
            ->with('success', 'Deleted successfull!');
    }
}
