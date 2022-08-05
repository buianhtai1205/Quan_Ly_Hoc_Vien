@extends('admin.layout.master')
@section('content')
    <h4>Update</h4>
    <form action="{{ route('admin.courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">CourseID</label>
                <input type="text" id="simpleinput" class="form-control" name="courseID" value="{{ $course->courseID }}">
            </div>
            <div class="form-group col-md-4">
                <label for="simpleinput">CourseName</label>
                <input type="text" id="simpleinput" class="form-control" name="courseName" value="{{ $course->courseName }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">BeginYear</label>
                <input type="text" id="simpleinput" class="form-control" name="beginYear" value="{{ $course->beginYear }}">
            </div>
            <div class="form-group col-md-4">
                <label for="simpleinput">EndYear</label>
                <input type="text" id="simpleinput" class="form-control" name="endYear" value="{{ $course->endYear }}">
            </div>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
