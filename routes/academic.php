<?php

use App\Http\Controllers\Users\Academic\AttendanceController;
use App\Http\Controllers\Users\Academic\ManageEducationProgram;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Users\Academic\ManageTeacherController;
use App\Http\Controllers\Users\Academic\ManageCourseController;
use App\Http\Controllers\Users\Academic\ManageStudentClassController;
use App\Http\Controllers\Users\Academic\ManageStudentController;
use App\Http\Controllers\Users\Academic\ManageSectionController;
use App\Http\Controllers\Users\Academic\DivideClassStudentController;
use App\Http\Controllers\Users\Academic\TeachingAssignmentController;

Route::middleware('auth:academic')->get('/testAcademic', [\Tests\Feature\ExampleTest::class, 'test_queue_handle']);

Route::middleware('auth:academic')->get('/homeAcademic', function () {
    return view('user.academic.home');
})->name('academics.home');

Route::group(['prefix' => '/manage_education_program', 'as' => 'manage_education_programs.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [ManageEducationProgram::class, 'index'])->name('index');
    Route::post('/import-csv', [ManageEducationProgram::class, 'importCsv'])->name('import_csv');
});

Route::group(['prefix' => '/manage_teacher', 'as' => 'manage_teachers.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [ManageTeacherController::class, 'index'])->name('index');
    Route::get('/create', [ManageTeacherController::class, 'create'])->name('create');
    Route::post('/create', [ManageTeacherController::class, 'store'])->name('store');
    Route::get('/edit/{teacher}', [ManageTeacherController::class, 'edit'])->name('edit');
    Route::put('/edit/{teacher}', [ManageTeacherController::class, 'update'])->name('update');
    Route::delete('/destroy/{teacher}', [ManageTeacherController::class, 'destroy'])->name('destroy');
    Route::post('/import-csv', [ManageTeacherController::class, 'importCsv'])->name('import_csv');
    Route::get('/api', [ManageTeacherController::class, 'api'])->name('api');
});

Route::group(['prefix' => '/manage_course', 'as' => 'manage_courses.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [ManageCourseController::class, 'index'])->name('index');
    Route::get('/create', [ManageCourseController::class, 'create'])->name('create');
    Route::post('/create', [ManageCourseController::class, 'store'])->name('store');
    Route::get('/edit/{course}', [ManageCourseController::class, 'edit'])->name('edit');
    Route::put('/edit/{course}', [ManageCourseController::class, 'update'])->name('update');
    Route::delete('/destroy/{course}', [ManageCourseController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/manage_student_class', 'as' => 'manage_student_classes.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [ManageStudentClassController::class, 'index'])->name('index');
    Route::get('/create', [ManageStudentClassController::class, 'create'])->name('create');
    Route::post('/create', [ManageStudentClassController::class, 'store'])->name('store');
    Route::get('/edit/{student_class}', [ManageStudentClassController::class, 'edit'])->name('edit');
    Route::put('/edit/{student_class}', [ManageStudentClassController::class, 'update'])->name('update');
    Route::delete('/destroy/{student_class}', [ManageStudentClassController::class, 'destroy'])->name('destroy');
});

Route::group(['prefix' => '/manage_student', 'as' => 'manage_students.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [ManageStudentController::class, 'index'])->name('index');
    Route::get('/create', [ManageStudentController::class, 'create'])->name('create');
    Route::post('/create', [ManageStudentController::class, 'store'])->name('store');
    Route::get('/edit/{student}', [ManageStudentController::class, 'edit'])->name('edit');
    Route::put('/edit/{student}', [ManageStudentController::class, 'update'])->name('update');
    Route::delete('/destroy/{student}', [ManageStudentController::class, 'destroy'])->name('destroy');
    Route::post('/import-csv', [ManageStudentController::class, 'importCsv'])->name('import_csv');
    Route::get('/api', [ManageStudentController::class, 'api'])->name('api');
});

Route::group(['prefix' => '/manage_section', 'as' => 'manage_sections.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [ManageSectionController::class, 'index'])->name('index');
    Route::get('/create', [ManageSectionController::class, 'create'])->name('create');
    Route::post('/create', [ManageSectionController::class, 'store'])->name('store');
    Route::get('/create_multiple', [ManageSectionController::class, 'createMultiple'])->name('create_multiple');
    Route::post('/create_multiple', [ManageSectionController::class, 'storeMultiple'])->name('store_multiple');
    Route::get('/create_automatic', [ManageSectionController::class, 'createAutomatic'])->name('create_automatic');
    Route::post('/create_automatic', [ManageSectionController::class, 'storeAutomatic'])->name('store_automatic');
    Route::get('/edit/{section}', [ManageSectionController::class, 'edit'])->name('edit');
    Route::put('/edit/{section}', [ManageSectionController::class, 'update'])->name('update');
    Route::delete('/destroy/{section}', [ManageSectionController::class, 'destroy'])->name('destroy');
    Route::get('/api', [ManageSectionController::class, 'api'])->name('api');
});

Route::group(['prefix' => '/divide_class_student', 'as' => 'divide_class_students.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [DivideClassStudentController::class, 'getInformationStudents'])->name('getInformationStudents');
    Route::get('/info', [DivideClassStudentController::class, 'index'])->name('index');
    Route::get('/divide', [DivideClassStudentController::class, 'divideClass'])->name('divideClass');
});

Route::group(['prefix' => '/teaching_assignment', 'as' => 'teaching_assignments.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [TeachingAssignmentController::class, 'index'])->name('index');
    Route::get('/assignment', [TeachingAssignmentController::class, 'assignment'])->name('assignment');
    Route::post('/assign', [TeachingAssignmentController::class, 'assign'])->name('assign');
    Route::post('/import-csv-room', [TeachingAssignmentController::class, 'importCsvRoom'])->name('import_csv_room');
    Route::get('/browse', [TeachingAssignmentController::class, 'browse'])->name('browse');
});

Route::group(['prefix' => '/academic_attendance', 'as' => 'academic_attendances.', 'middleware' => 'auth:academic'], static function() {
    Route::get('/', [AttendanceController::class, 'index'])->name('index');
    Route::get('/get-lesson', [AttendanceController::class, 'getLesson'])->name('get_lesson');
});
