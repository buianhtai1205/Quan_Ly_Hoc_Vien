@extends('layout.master')
@section('content')
    <h4>Insert</h4>
    <form action="{{ route('admin.subjects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">SubjectID</label>
                <input type="text" id="simpleinput" class="form-control" name="subjectID" value="{{ old('subjectID') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">SubjectName</label>
                <input type="text" id="simpleinput" class="form-control" name="subjectName" value="{{ old('subjectName') }}">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">NumOfCredits</label>
                <input type="text" id="simpleinput" class="form-control" name="numOfCredits" value="{{ old('numOfCredits') }}">
            </div>
        </div>
        <button class="btn btn-success">Insert</button>
    </form>
@endsection
