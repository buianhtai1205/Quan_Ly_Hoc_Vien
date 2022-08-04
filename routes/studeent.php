<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:student')->get('/homeStudent', function () {
    return view('user.student.home');
})->name('students.home');
