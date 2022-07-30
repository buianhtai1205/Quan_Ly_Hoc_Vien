@extends('layout.master_academic')

@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Divide Class Student
    </div>

    {{--  Message  --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    {{--  Content  --}}
    <div class="content-main">
        <form action="{{ route('divide_class_students.index') }}">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Course : </label>
                    <select name="course" id='course' class="form-control" >
                        <option value="">--Select Course--</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course->courseID }}">{{ $course->courseName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label>Faculty : </label>
                    <select name="faculty" id='faculty' class="form-control" >
                        <option value="all">--Tất cả--</option>
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->facultyName }}">{{ $faculty->facultyName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3" style="display: flex; align-items: center; justify-content: center;">
                    <button class="btn btn-success" style="height: 40px;">Select</button>
                </div>

            </div>

        </form>
    </div>
@endsection

