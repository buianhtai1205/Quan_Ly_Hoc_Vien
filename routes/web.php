<?php

use App\Http\Controllers\AcademicController;
use App\Models\Academic;
use Illuminate\Support\Facades\Route;

Route::get('/admin/academic/api', [AcademicController::class, 'api'])->name('academics.api');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/', function () {
    return view('auth.login');
});
Route::group(['prefix' => '/admin/academic', 'as' => 'academics.'], function() {
    Route::get('/', [AcademicController::class, 'index'])->name('index');
    Route::get('/create', [AcademicController::class, 'create'])->name('create');
    Route::post('/create', [AcademicController::class, 'store'])->name('store');
    Route::get('/edit/{academic}', [AcademicController::class, 'edit'])->name('edit');
    Route::put('/edit/{academic}', [AcademicController::class, 'update'])->name('update');
    Route::delete('/destroy/{academic}', [AcademicController::class, 'destroy'])->name('destroy');
});

