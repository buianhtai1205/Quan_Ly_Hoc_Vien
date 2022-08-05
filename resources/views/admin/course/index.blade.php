@extends('admin.layout.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <a class="btn btn-success" href="{{ route('admin.courses.create') }}">Insert</a>
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
                    <a class="btn btn-primary" href="{{ route('admin.courses.edit', $course->id) }}">Edit</a>
                </th>
                <th>
                    <form action="{{ route('admin.courses.destroy', $course->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </th>
            </tr>
            </thead>
        @endforeach
    </table>
@endsection
