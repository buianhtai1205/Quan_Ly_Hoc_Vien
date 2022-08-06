@extends('layout.user.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Student Class / Insert
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
        <form action="{{ route('manage_student_classes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="example-select">CourseID</label>
                    <select class="form-control" id="example-select" name="courseID">
                        @foreach ($courses as $course)
                            <option value="{{ $course->courseID }}">{{ $course->courseName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="example-select">FacultyID</label>
                    <select class="form-control" id="example-select" name="facultyID">
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->facultyID }}">{{ $faculty->facultyName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="simpleinput">ClassID</label>
                    <input type="text" id="simpleinput" class="form-control" name="classID" value="{{ old('classID') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="simpleinput">ClassName</label>
                    <input type="text" id="simpleinput" class="form-control" name="className" value="{{ old('className') }}">
                </div>
            </div>
            <button class="btn btn-success">Insert</button>
        </form>
    </div>

@endsection
