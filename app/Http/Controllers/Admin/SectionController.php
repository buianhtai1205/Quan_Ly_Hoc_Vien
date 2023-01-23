<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class SectionController extends Controller
{

    private $model;

    public function __construct()
    {
        $this->model = new Section();
        $routeName = Route::currentRouteName();
        $arr = explode('.', $routeName);
        $arr = array_map('ucfirst', $arr);
        $title = implode(' / ', $arr);
        View::share('title', $title);
    }

    public function index()
    {
        return view('admin.section.index');
    }

    public function api()
    {
        return Datatables::of($this->model->with('subject'))
            ->addColumn('subjectName', function (Section $section) {
                return $section->subject->subjectName;
            })
            ->addColumn('edit', function ($object) {
                return route('admin.sections.edit', $object);
            })
            ->addColumn('delete', function ($object) {
                return route('admin.sections.destroy', $object);
            })
            ->make(true);
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('admin.section.create', [
            'subjects' => $subjects,
        ]);
    }


    public function store(StoreSectionRequest $request)
    {
        $this->model->create($request->validated());
        return redirect()->route('admin.sections.index')
            ->with('success', 'Inserted successful');
    }


    public function show(Section $section)
    {
        //
    }


    public function edit(Section $section)
    {
        $subjects = Subject::all();
        return view('admin.section.edit', [
            'section' => $section,
            'subjects' => $subjects,
        ]);
    }


    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->validated());
        return redirect()->route('admin.sections.index')
            ->with('success', 'Updated successful!');
    }


    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('admin.sections.index')
            ->with('success', 'Deleted successful!');
    }
}
