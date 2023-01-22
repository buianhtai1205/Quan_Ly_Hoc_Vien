<?php

use App\Http\Controllers\Admin\AcademicController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\TeacherController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FacultyController;
use App\Http\Controllers\Admin\StudentclassController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/academic/api', [AcademicController::class, 'api'])->name('admin.academics.api');
Route::get('/admin/teacher/api', [TeacherController::class, 'api'])->name('admin.teachers.api');
Route::get('/admin/student/api', [StudentController::class, 'api'])->name('admin.students.api');
Route::get('/admin/section/api', [SectionController::class, 'api'])->name('admin.sections.api');

Route::get('/admin/', function () {
    return view('admin.auth.login');
});
Route::group(['prefix' => '/admin/academic', 'as' => 'admin.academics.'], function() {
    Route::get('/', [AcademicController::class, 'index'])->name('index');
    Route::get('/create', [AcademicController::class, 'create'])->name('create');
    Route::post('/create', [AcademicController::class, 'store'])->name('store');
    Route::get('/edit/{academic}', [AcademicController::class, 'edit'])->name('edit');
    Route::put('/edit/{academic}', [AcademicController::class, 'update'])->name('update');
    Route::delete('/destroy/{academic}', [AcademicController::class, 'destroy'])->name('destroy');
    Route::post('/import-csv', [AcademicController::class, 'importCsv'])->name('import_csv');
});

Route::group(['prefix' => '/admin/teacher', 'as' => 'admin.teachers.'], function() {
    Route::get('/', [TeacherController::class, 'index'])->name('index');
    Route::get('/create', [TeacherController::class, 'create'])->name('create');
    Route::post('/create', [TeacherController::class, 'store'])->name('store');
    Route::get('/edit/{teacher}', [TeacherController::class, 'edit'])->name('edit');
    Route::put('/edit/{teacher}', [TeacherController::class, 'update'])->name('update');
    Route::delete('/destroy/{teacher}', [TeacherController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/admin/course', 'as' => 'admin.courses.'], function() {
    Route::get('/', [CourseController::class, 'index'])->name('index');
    Route::get('/create', [CourseController::class, 'create'])->name('create');
    Route::post('/create', [CourseController::class, 'store'])->name('store');
    Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('edit');
    Route::put('/edit/{course}', [CourseController::class, 'update'])->name('update');
    Route::delete('/destroy/{course}', [CourseController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/admin/faculty', 'as' => 'admin.faculties.'], function() {
    Route::get('/', [FacultyController::class, 'index'])->name('index');
    Route::get('/create', [FacultyController::class, 'create'])->name('create');
    Route::post('/create', [FacultyController::class, 'store'])->name('store');
    Route::get('/edit/{faculty}', [FacultyController::class, 'edit'])->name('edit');
    Route::put('/edit/{faculty}', [FacultyController::class, 'update'])->name('update');
    Route::delete('/destroy/{faculty}', [FacultyController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/admin/studentClass', 'as' => 'admin.studentClasses.'], function() {
    Route::get('/', [StudentclassController::class, 'index'])->name('index');
    Route::get('/create', [StudentclassController::class, 'create'])->name('create');
    Route::post('/create', [StudentclassController::class, 'store'])->name('store');
    Route::get('/edit/{studentClass}', [StudentclassController::class, 'edit'])->name('edit');
    Route::put('/edit/{studentClass}', [StudentclassController::class, 'update'])->name('update');
    Route::delete('/destroy/{studentClass}', [StudentclassController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/admin/student', 'as' => 'admin.students.'], function() {
    Route::get('/', [StudentController::class, 'index'])->name('index');
    Route::get('/create', [StudentController::class, 'create'])->name('create');
    Route::post('/create', [StudentController::class, 'store'])->name('store');
    Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
    Route::put('/edit/{student}', [StudentController::class, 'update'])->name('update');
    Route::delete('/destroy/{student}', [StudentController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/admin/subject', 'as' => 'admin.subjects.'], function() {
    Route::get('/', [SubjectController::class, 'index'])->name('index');
    Route::get('/create', [SubjectController::class, 'create'])->name('create');
    Route::post('/create', [SubjectController::class, 'store'])->name('store');
    Route::get('/edit/{subject}', [SubjectController::class, 'edit'])->name('edit');
    Route::put('/edit/{subject}', [SubjectController::class, 'update'])->name('update');
    Route::delete('/destroy/{subject}', [SubjectController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/admin/section', 'as' => 'admin.sections.'], function() {
    Route::get('/', [SectionController::class, 'index'])->name('index');
    Route::get('/create', [SectionController::class, 'create'])->name('create');
    Route::post('/create', [SectionController::class, 'store'])->name('store');
    Route::get('/edit/{section}', [SectionController::class, 'edit'])->name('edit');
    Route::put('/edit/{section}', [SectionController::class, 'update'])->name('update');
    Route::delete('/destroy/{section}', [SectionController::class, 'destroy'])->name('destroy');
});
