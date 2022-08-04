<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:teacher')->get('/homeTeacher', function () {
    return view('user.teacher.home');
})->name('teachers.home');
