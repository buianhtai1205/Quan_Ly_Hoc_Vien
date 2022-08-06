@extends('layout.admin.master')
@section('content')
    <h4>Update</h4>
    <form action="{{ route('admin.faculties.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">FacultyID</label>
                <input type="text" id="simpleinput" class="form-control" name="facultyID" value="{{ $faculty->facultyID }}">
            </div>
            <div class="form-group col-md-4">
                <label for="simpleinput">FacultyName</label>
                <input type="text" id="simpleinput" class="form-control" name="facultyName" value="{{ $faculty->facultyName }}">
            </div>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
