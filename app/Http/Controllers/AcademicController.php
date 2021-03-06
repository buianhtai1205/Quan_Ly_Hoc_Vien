<?php

namespace App\Http\Controllers;

use App\Imports\AcademicsImport;
use App\Models\Academic;
use App\Http\Requests\StoreAcademicRequest;
use App\Http\Requests\UpdateAcademicRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Exceptions\NoTypeDetectedException;
use Yajra\DataTables\Facades\DataTables;

class AcademicController extends Controller
{
    private $model;
    public function __construct()
    {
        $this->model = new Academic();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' / ', $arr);
        View::share('title', $title);
    }
    public function index()
    {
        return view('academic.index');
    }

    public function api()
    {
        return Datatables::of(Academic::query())
            ->addColumn('edit', function ($object) {
                return route('admin.academics.edit', $object);
            })
            ->addColumn('delete', function ($object) {
                return route('admin.academics.destroy', $object);
            })
            ->make(true);
    }

    public function importCsv(Request $request)
    {
        try {
            Excel::import(new AcademicsImport, $request->file('file'));
        } catch (NoTypeDetectedException $e) {
            return 1;
        }
    }

    public function create()
    {
        return view('academic.create');
    }


    public function store(StoreAcademicRequest $request)
    {
        $path = Storage::disk('public')->putFile('avatars', $request->file('avatar'));
        $array = $request->validated();
        $array['avatar'] = $path;
        Academic::create($array);

        return redirect()->route('admin.academics.index')->with('success', 'Inserted successfull!');
    }



    public function show(Academic $academic)
    {
        //
    }


    public function edit(Academic $academic)
    {
        return view('academic.edit', [
            'academic' => $academic,
        ]);
    }

    public function update(UpdateAcademicRequest $request, Academic $academic)
    {
        $academic->update($request->validated());
        return redirect()->route('admin.academics.index')->with('success', 'Updated successfull!');
    }

    public function destroy(Academic $academic)
    {
        $academic->delete();
        return redirect()->route('admin.academics.index')->with('success', 'Deleted successfull!');
    }
}
