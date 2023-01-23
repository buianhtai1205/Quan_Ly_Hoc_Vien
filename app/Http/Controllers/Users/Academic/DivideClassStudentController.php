<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Studentclass;
use Exception;
use Illuminate\Http\Request;

class DivideClassStudentController extends Controller
{
    public function getInformationStudents()
    {
        $courses = Course::all();
        $faculties = Faculty::all();
        return view('user.academic.divide_class_student.getInformationStudents', [
            'courses' => $courses,
            'faculties' => $faculties,
        ]);
    }

    public function index(Request $request)
    {
        $courses = Course::all();
        $faculties = Faculty::all();

        $course = $request->get('course');
        $faculty = $request->get('faculty');

        $sum = Student::getCountStudentsToDivide($course, $faculty);

        return view('user.academic.divide_class_student.index', [
            'sum' => $sum,
            'courses' => $courses,
            'faculties' => $faculties,
            'courseCurrent' => $course,
            'facultyCurrent' => $faculty,
        ]);
    }

    public function divideClass(Request $request)
    {
        try {
            // get value from request
            $numClass = $request->get('numClass');
            $course = $request->get('course');
            $faculty = $request->get('faculty');

            Studentclass::handleDivide($numClass, $course, $faculty);

            return redirect()->route('divide_class_students.getInformationStudents')
                ->with('success', 'Divided successful!');

        } catch (Exception $e) {
            dd($e);
        }
    }
}
