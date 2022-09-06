<?php

use App\Http\Controllers\Users\Teacher\AcceptAssignmentController;
use App\Http\Controllers\Users\Teacher\RegisterTeachingController;
use App\Http\Controllers\Users\Teacher\TeacherAttendanceController;
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

Route::group(['prefix' => '/teacher_attendance', 'as' => 'teacher_attendances.', 'middleware' => 'auth:teacher'], function() {
    Route::post('/', [TeacherAttendanceController::class, 'index'])->name('index');
    Route::get('/select_classroom', [TeacherAttendanceController::class, 'selectClassroom'])->name('select_classroom');
    Route::post('/api_section', [TeacherAttendanceController::class, 'apiSection'])->name('api_section');
    Route::post('/api_week', [TeacherAttendanceController::class, 'apiWeek'])->name('api_week');
    Route::post('/attendance', [TeacherAttendanceController::class, 'attendance'])->name('attendance');
});

