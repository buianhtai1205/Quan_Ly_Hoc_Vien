@extends('layout.admin.master')
@section('content')
    <h4>Insert</h4>
    <form action="{{ route('admin.sections.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="simpleinput">SectionID</label>
                <input type="text" id="simpleinput" class="form-control" name="sectionID" value="{{ old('sectionID') }}">
            </div>
            <div class="form-group col-md-3">
                <label for="example-select">SubjectID</label>
                <select class="form-control" id="example-select" name="subjectID">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->subjectID }}">{{ $subject->subjectName }} - {{ $subject->subjectID }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="simpleinput">TypeSection</label>
                <input type="text" id="simpleinput" class="form-control" name="typeSection" value="{{ old('typeSection') }}">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="simpleinput">NumOfLesson</label>
                <input name="numOfLesson" value="{{ old('numOfLesson') }}" type="text" id="simpleinput" class="form-control">
            </div>
            <div class="form-group col-md-3">
                <label for="simpleinput">Limit</label>
                <input name="limit" value="{{ old('limit') }}" type="text" id="simpleinput" class="form-control">
            </div>
        </div>

        <button class="btn btn-success">Insert</button>
    </form>
@endsection
