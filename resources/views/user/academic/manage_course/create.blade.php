@extends('layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Course / Insert
    </div>

    {{--  Message  --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    {{--  Content  --}}
    <div class="content-main">
        <form action="{{ route('manage_courses.store') }}" method="POST" enctype="multipart/form-data">
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
    </div>
@endsection
