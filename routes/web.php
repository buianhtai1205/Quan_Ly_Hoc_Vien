<?php

use App\Http\Controllers\AcademicController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/academic/api', [AcademicController::class, 'api'])->name('admin.academics.api');
Route::get('/admin/teacher/api', [TeacherController::class, 'api'])->name('admin.teachers.api');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/', function () {
    return view('auth.login');
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
