@extends('layout.master')
@section('content')
    <h4>Insert</h4>
    <form action="{{ route('admin.faculties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">FacultyID</label>
                <input type="text" id="simpleinput" class="form-control" name="facultyID" value="{{ old('facultyID') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="simpleinput">FacultyName</label>
                <input type="text" id="simpleinput" class="form-control" name="facultyName" value="{{ old('facultyName') }}">
            </div>
        </div>
        <button class="btn btn-success">Insert</button>
    </form>
@endsection
