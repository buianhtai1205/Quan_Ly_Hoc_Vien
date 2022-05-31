<?php

use App\Http\Controllers\AcademicController;
use App\Models\Academic;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/', function () {
    return view('academic.index');
});
