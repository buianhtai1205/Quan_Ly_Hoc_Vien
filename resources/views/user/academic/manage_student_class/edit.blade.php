@extends('layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Student Class / Update
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
        <form action="{{ route('manage_student_classes.update', $studentClass->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="example-select">CourseID</label>
                    <select class="form-control" id="example-select" name="courseID">
                        @foreach ($courses as $course)
                            <option @if ($studentClass->courseID === $course->courseID) selected
                                    @endif value="{{ $course->courseID }}" >
                                {{ $course->courseName }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="example-select">FacultyID</label>
                    <select class="form-control" id="example-select" name="facultyID">
                        @foreach ($faculties as $faculty)
                            <option @if ($studentClass->facultyID === $faculty->facultyID) selected
                                    @endif value="{{ $faculty->facultyID }}">{{ $faculty->facultyName }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="simple-input">ClassID</label>
                    <input type="text" id="simple-input" class="form-control" name="classID" value="{{ $studentClass->classID }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="simple-input">ClassName</label>
                    <input type="text" id="simple-input" class="form-control" name="className" value="{{ $studentClass->className }}">
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>


@endsection
