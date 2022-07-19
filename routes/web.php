<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\Academic\ManageTeacherController;
use App\Http\Controllers\Users\Academic\ManageCourseController;

Route::get('/', function () {
    return view('user.index');
});

Route::get('/login', function () {
    return view('user.login');
})->name('users.login');

Route::get('/home', function () {
    return view('user.home');
});


Route::get('/manage_teacher/api', [ManageTeacherController::class, 'api'])->name('manage_teachers.api');

Route::group(['prefix' => '/manage_teacher', 'as' => 'manage_teachers.'], function() {
    Route::get('/', [ManageTeacherController::class, 'index'])->name('index');
    Route::get('/create', [ManageTeacherController::class, 'create'])->name('create');
    Route::post('/create', [ManageTeacherController::class, 'store'])->name('store');
    Route::get('/edit/{teacher}', [ManageTeacherController::class, 'edit'])->name('edit');
    Route::put('/edit/{teacher}', [ManageTeacherController::class, 'update'])->name('update');
    Route::delete('/destroy/{teacher}', [ManageTeacherController::class, 'destroy'])->name('destroy');
    Route::post('/import-csv', [ManageTeacherController::class, 'importCsv'])->name('import_csv');
});

Route::group(['prefix' => '/manage_course', 'as' => 'manage_courses.'], function() {
    Route::get('/', [ManageCourseController::class, 'index'])->name('index');
    Route::get('/create', [ManageCourseController::class, 'create'])->name('create');
    Route::post('/create', [ManageCourseController::class, 'store'])->name('store');
    Route::get('/edit/{course}', [ManageCourseController::class, 'edit'])->name('edit');
    Route::put('/edit/{course}', [ManageCourseController::class, 'update'])->name('update');
    Route::delete('/destroy/{course}', [ManageCourseController::class, 'destroy'])->name('destroy');
});
