<?php

use App\Http\Controllers\Users\Teacher\RegisterTeachingController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:teacher')->get('/homeTeacher', function () {
    return view('user.teacher.home');
})->name('teachers.home');

Route::group(['prefix' => '/register_teaching', 'as' => 'register_teachings.', 'middleware' => 'auth:teacher'], function() {
    Route::get('/', [RegisterTeachingController::class, 'index'])->name('index');
    Route::post('/register', [RegisterTeachingController::class, 'register'])->name('register');
});
