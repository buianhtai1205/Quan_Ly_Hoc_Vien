@extends('layout.master')
@section('content')
    <h4>Insert</h4> <br>
    <form action="{{ route('admin.subjects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="simpleinput">SubjectID</label>
                <input type="text" id="simpleinput" class="form-control" name="subjectID" value="{{ old('subjectID') }}">
            </div>
            <div class="form-group col-md-3">
                <label for="simpleinput">SubjectName</label>
                <input type="text" id="simpleinput" class="form-control" name="subjectName" value="{{ old('subjectName') }}">
            </div>
            <div class="form-group col-md-3">
                <label for="simpleinput">NumOfCredits</label>
                <input type="text" id="simpleinput" class="form-control" name="numOfCredits" value="{{ old('numOfCredits') }}">
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
        <button class="btn btn-success">Insert</button>
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
