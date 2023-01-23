<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Models\Section;
use App\Http\Requests\StoreSectionRequest;
use App\Http\Requests\UpdateSectionRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class ManageSectionController extends Controller
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
        return view('user.academic.manage_section.index');
    }

    public function api()
    {
        return Datatables::of($this->model->with('subject'))
            ->addColumn('subjectName', function (Section $section) {
                return $section->subject->subjectName;
            })
            ->addColumn('edit', function ($object) {
                return route('manage_sections.edit', $object);
            })
            ->addColumn('delete', function ($object) {
                return route('manage_sections.destroy', $object);
            })
            ->make(true);
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('user.academic.manage_section.create', [
            'subjects' => $subjects,
        ]);
    }

    public function createMultiple()
    {
        $subjects = Subject::all();
        return view('user.academic.manage_section.createMultiple', [
            'subjects' => $subjects,
        ]);
    }

    public function createAutomatic()
    {
        return view('user.academic.manage_section.createAutomatic');
    }


    public function store(StoreSectionRequest $request)
    {
        $this->model->create($request->validated());
        return redirect()->route('manage_sections.index')
            ->with('success', 'Inserted successful');
    }

    public function storeMultiple(Request $request)
    {
        // get value from Request
        $subjectID = $request->get('subjectID');
        $typeSection = $request->get('typeSection');
        $numOfLesson = $request->get('numOfLesson');
        $limit = $request->get('limit');
        $numOfSection = $request->get('numOfSection');
        $schoolYear = $request->get('schoolYear');
        $semester = $request->get('semester');

        // create section
        (new Section)->createManySections($subjectID, $typeSection, $numOfLesson,
            $limit, $numOfSection, $schoolYear, $semester);

        return redirect()->route('manage_sections.index')
            ->with('success', 'Inserted Multiple successful');
    }

    public function storeAutomatic(Request $request)
    {
        // get value from Request
        $typeSection = $request->get('typeSection');
        $numOfLesson = $request->get('numOfLesson');
        $limit = $request->get('limit');
        $numOfSection = $request->get('numOfSection');
        $schoolYear = $request->get('schoolYear');
        $semester = $request->get('semester');

        (new Section)->createAutomaticSections($typeSection, $numOfLesson,
            $limit, $numOfSection, $schoolYear, $semester);

        return redirect()->route('manage_sections.index')
            ->with('success', 'Inserted Automatic successful');
    }


    public function show(Section $section)
    {
        //
    }


    public function edit(Section $section)
    {
        $subjects = Subject::all();
        return view('user.academic.manage_section.edit', [
            'section' => $section,
            'subjects' => $subjects,
        ]);
    }


    public function update(UpdateSectionRequest $request, Section $section)
    {
        $section->update($request->validated());
        return redirect()->route('manage_sections.index')
            ->with('success', 'Updated successful!');
    }


    public function destroy(Section $section)
    {
        $section->delete();
        return redirect()->route('manage_sections.index')
            ->with('success', 'Deleted successful!');
    }
}
