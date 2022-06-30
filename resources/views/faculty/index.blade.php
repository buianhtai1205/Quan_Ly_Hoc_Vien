@extends('layout.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <a class="btn btn-success" href="{{ route('admin.faculties.create') }}">Insert</a>
    <br> <br>
    <table id="table-index" class="table table-striped dt-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>FacultyID</th>
            <th>FacultyName</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        @foreach($faculties as $faculty)
            <thead>
            <tr>
                <th>{{ $faculty->id }}</th>
                <th>{{ $faculty->facultyID }}</th>
                <th>{{ $faculty->facultyName }}</th>
                <th>
                    <a class="btn btn-primary" href="{{ route('admin.faculties.edit', $faculty->id) }}">Edit</a>
                </th>
                <th>
                    <form action="{{ route('admin.faculties.destroy', $faculty->id) }}" method="post">
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
