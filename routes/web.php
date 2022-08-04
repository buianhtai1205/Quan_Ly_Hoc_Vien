<?php

use App\Http\Controllers\Users\Auth\LoginAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('user.index');
});

Route::get('/login', [LoginAuthController::class, 'showLoginForm'])->name('users.login');
Route::post('/loginHandle', [LoginAuthController::class, 'login'])->name('users.loginHandle');
Route::get('/logout', [LoginAuthController::class, 'logout'])->name('users.logout');








