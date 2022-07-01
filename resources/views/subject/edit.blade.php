@extends('layout.master')
@section('content')
    <h4>Update</h4>
    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">SubjectID</label>
                <input type="text" id="simpleinput" class="form-control" name="subjectID" value="{{ $subject->subjectID }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">SubjectName</label>
                <input type="text" id="simpleinput" class="form-control" name="subjectName" value="{{ $subject->subjectName }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">NumOfCredits</label>
                <input type="text" id="simpleinput" class="form-control" name="numOfCredits" value="{{ $subject->numOfCredits }}">
            </div>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
