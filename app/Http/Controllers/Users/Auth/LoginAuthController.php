<?php

namespace App\Http\Controllers\Users\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginAuthController extends Controller
{
    public function showLoginForm()
    {
        if ( Auth ::guard('academic') -> check() ) {
            return redirect() -> route('academics.home');
        }
        if ( Auth ::guard('teacher') -> check() ) {
            return redirect() -> route('teachers.home');
        }
        if ( Auth ::guard('student') -> check() ) {
            return redirect() -> route('students.home');
        }

        return view('user.auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->object === 'AcademicStaff')
        {
            if(auth()->guard('academic')->attempt([
                'academicID' => $request->username,
                'password' => $request->password,
                ])) {
                $request->session()->regenerate();
                return redirect()->intended(route('academics.home'));
            }
        }

        if ($request->object === 'Teacher')
        {
            if(auth()->guard('teacher')->attempt([
                'teacherID' => $request->username,
                'password' => $request->password,
            ])) {
                $request->session()->regenerate();
                return redirect()->intended(route('teachers.home'));
            }
        }
        if ($request->object === 'Student')
        {
            if(auth()->guard('student')->attempt([
                'studentID' => $request->username,
                'password' => $request->password,
            ])) {
                $request->session()->regenerate();
                return redirect()->intended(route('students.home'));
            }
        }

        // if Auth::attempt fails (wrong credentials) create a new message bag instance.
        $errors = ('ID or password is incorrect.');
        // redirect back to the login page, using ->withErrors($errors) you send the error created above
        return redirect()->back()->withError($errors);
    }


    public function logout(Request $request)
    {
        Auth::guard('academic')->logout();
        Auth::guard('teacher')->logout();
        Auth::guard('student')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
