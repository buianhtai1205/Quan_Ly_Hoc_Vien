@extends('layout.user.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Course / Edit
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
        <form action="{{ route('manage_courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
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
    </div>
@endsection
