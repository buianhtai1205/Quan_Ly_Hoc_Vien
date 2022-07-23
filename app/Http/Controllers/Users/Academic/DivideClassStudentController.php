<?php

namespace App\Http\Controllers\Users\Academic;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Faculty;
use App\Models\Student;
use App\Models\Studentclass;
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
        $strCourse = substr($course, -2, 2);

        $sum = Student::where("studentID", "LIKE", "$strCourse%")
            ->where("facultyName", "=", (string) $faculty)
            ->count();

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
        try
        {
            // get value from request
            $numClass = $request->get('numClass');
            $course = $request->get('course');
            $faculty = $request->get('faculty');
            $strCourse = substr($course, -2, 2);

            // get list students according to faculty and course
            $students = Student::where("studentID", "LIKE", "$strCourse%")
                ->where("facultyName", "=", (string) $faculty)->get();

            // get facultyID from facultyName
            $facultyID = Faculty::where("facultyName", "=", $faculty)->first()->facultyID;

            // create array class to save classID
            $arrayClassID = [];

            // create num class
            (new Studentclass)->createManyStudentClass($numClass, $strCourse, $course, $facultyID, $arrayClassID);

            // divide
            (new Studentclass)->divideStudentsToClasses($students, $arrayClassID);

            return redirect()->route('divide_class_students.getInformationStudents')
                ->with('success', 'Divided successful!');
        }
        catch (Exception $e)
        {
            dd($e);
        }
    }
}
