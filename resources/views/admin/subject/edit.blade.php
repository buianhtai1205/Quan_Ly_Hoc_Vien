@extends('layout.admin.master')
@section('content')
    <h4>Update</h4>

    <form action="{{ route('admin.subjects.update', $subject->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="simpleinput">SubjectID</label>
                <input type="text" id="simpleinput" class="form-control" name="subjectID" value="{{ $subject->subjectID }}">
            </div>
            <div class="form-group col-md-3">
                <label for="simpleinput">SubjectName</label>
                <input type="text" id="simpleinput" class="form-control" name="subjectName" value="{{ $subject->subjectName }}">
            </div>
            <div class="form-group col-md-3">
                <label for="simpleinput">NumOfCredits</label>
                <input type="text" id="simpleinput" class="form-control" name="numOfCredits" value="{{ $subject->numOfCredits }}">
            </div>
        </div>
        <div>
            <label for="">Faculties</label> <br>
            <input type="button" id="btnCheckAll" value="CheckAll" class="btn btn-primary" >
            <input type="button" id="btnUncheckAll" value="UncheckAll" class="btn btn-secondary" >
        </div>
        <br>
        <div class="form-row">
            @foreach($faculties as $faculty)
                <div class="form-group col-md-2">
                    <input id="simple-input-{{ $faculty->id }}" type="checkbox" name="faculties[]" value="{{$faculty->facultyID}}">
                    <label for="simple-input-{{ $faculty->id }}">{{$faculty->facultyName}}</label>
                </div>
            @endforeach
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            $("#btnCheckAll").click(function() {
                var checkboxes = document.getElementsByName('faculties[]');
                for (var i = 0; i < checkboxes.length; i++){
                    checkboxes[i].checked = true;
                }
            });
            $("#btnUncheckAll").click(function() {
                var checkboxes = document.getElementsByName('faculties[]');
                for (var i = 0; i < checkboxes.length; i++){
                    checkboxes[i].checked = false;
                }
            });
        });
    </script>
@endpush
