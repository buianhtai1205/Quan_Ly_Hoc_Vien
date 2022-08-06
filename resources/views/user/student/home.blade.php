@extends('layout.user.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-house-chimney icon-sidebar"></i>Home
    </div>

    {{--  Content  --}}
    <div>
        <h5>
            @if(Auth ::guard('academic') -> check())
                Hello, Academic Staff {{ Auth ::guard('academic')->user()->fullName }}
            @endif

            @if(Auth ::guard('teacher') -> check())
                Hello, Teacher: {{ Auth ::guard('teacher')->user()->fullName }}
            @endif

            @if(Auth ::guard('student') -> check())
                Hello, Student: {{ Auth ::guard('student')->user()->fullName }}
            @endif
        </h5>
    </div>
@endsection


