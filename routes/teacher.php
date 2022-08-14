<?php

use App\Http\Controllers\Users\Teacher\AcceptAssignmentController;
use App\Http\Controllers\Users\Teacher\RegisterTeachingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:teacher')->get('/homeTeacher', function () {
    return view('user.teacher.home');
})->name('teachers.home');

Route::group(['prefix' => '/register_teaching', 'as' => 'register_teachings.', 'middleware' => 'auth:teacher'], function() {
    Route::get('/', [RegisterTeachingController::class, 'index'])->name('index');
    Route::get('/create', [RegisterTeachingController::class, 'create'])->name('create');
    Route::post('/create', [RegisterTeachingController::class, 'store'])->name('store');
    Route::post('/edit', [RegisterTeachingController::class, 'edit'])->name('edit');
    Route::post('/update', [RegisterTeachingController::class, 'update'])->name('update');
    Route::post('/destroy', [RegisterTeachingController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/accept_assignment', 'as' => 'accept_assignments.', 'middleware' => 'auth:teacher'], function() {
    Route::get('/', [AcceptAssignmentController::class, 'index'])->name('index');
    Route::post('/api_room', [AcceptAssignmentController::class, 'apiRoom'])->name('api_room');
    Route::post('/api_shift', [AcceptAssignmentController::class, 'apiShift'])->name('api_shift');
    Route::post('/update', [AcceptAssignmentController::class, 'update'])->name('update');
    Route::get('/accept', [AcceptAssignmentController::class, 'accept'])->name('accept');
});

