@extends('layout.master')
@section('content')
    <h4>Update</h4>
    <form action="{{ route('admin.studentClasses.update', $studentClass->id) }}" method="POST" enctype="multipart/form-data">
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
@endsection
