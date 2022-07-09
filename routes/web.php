<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

Route::get('/login', function () {
    return view('user.login');
})->name('users.login');

Route::get('/home', function () {
    return view('user.home');
});
