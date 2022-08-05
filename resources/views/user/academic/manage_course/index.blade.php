@extends('admin.layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Course
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
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <a class="btn btn-success" href="{{ route('manage_courses.create') }}">Insert</a>
        <br> <br>
        <table id="table-index" class="table table-striped dt-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>CourseID</th>
                <th>CourseName</th>
                <th>BeginYear</th>
                <th>EndYear</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            @foreach($courses as $course)
                <thead>
                <tr>
                    <th>{{ $course->id }}</th>
                    <th>{{ $course->courseID }}</th>
                    <th>{{ $course->courseName }}</th>
                    <th>{{ $course->beginYear }}</th>
                    <th>{{ $course->endYear }}</th>
                    <th>
                        <a class="btn btn-primary" href="{{ route('manage_courses.edit', $course->id) }}">Edit</a>
                    </th>
                    <th>
                        <form action="{{ route('manage_courses.destroy', $course->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </th>
                </tr>
                </thead>
            @endforeach
        </table>
    </div>
@endsection
