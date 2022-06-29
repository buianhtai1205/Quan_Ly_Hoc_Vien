@extends('layout.master')
@section('content')
    <h4>Insert</h4>
    <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">CourseID</label>
                <input type="text" id="simpleinput" class="form-control" name="courseID" value="{{ old('courseID') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="simpleinput">CourseName</label>
                <input type="text" id="simpleinput" class="form-control" name="courseName" value="{{ old('courseName') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">BeginYear</label>
                <input type="text" id="simpleinput" class="form-control" name="beginYear" value="{{ old('beginYear') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="simpleinput">EndYear</label>
                <input type="text" id="simpleinput" class="form-control" name="endYear" value="{{ old('endYear') }}">
            </div>
        </div>
        <button class="btn btn-success">Insert</button>
    </form>
@endsection
