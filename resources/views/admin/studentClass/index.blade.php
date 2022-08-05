@extends('admin.layout.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <a class="btn btn-success" href="{{ route('admin.studentClasses.create') }}">Insert</a>
    <br> <br>
    <table id="table-index" class="table table-striped dt-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>CourseID</th>
            <th>FacultyID</th>
            <th>ClassID</th>
            <th>ClassName</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        @foreach($studentClasses as $studentClass)
            <thead>
            <tr>
                <th>{{ $studentClass->id }}</th>
                <th>{{ $studentClass->courseID }}</th>
                <th>{{ $studentClass->facultyID }}</th>
                <th>{{ $studentClass->classID }}</th>
                <th>{{ $studentClass->className }}</th>
                <th>
                    <a class="btn btn-primary" href="{{ route('admin.studentClasses.edit', $studentClass->id) }}">Edit</a>
                </th>
                <th>
                    <form action="{{ route('admin.studentClasses.destroy', $studentClass->id) }}" method="post">
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
