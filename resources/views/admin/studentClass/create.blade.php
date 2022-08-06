@extends('layout.admin.master')
@section('content')
    <h4>Insert</h4> <br>
    <form action="{{ route('admin.studentClasses.store') }}" method="POST" enctype="multipart/form-data">
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
@endsection
