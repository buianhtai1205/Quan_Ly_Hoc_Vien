@extends('layout.user.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Student Class
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
        <a class="btn btn-success" href="{{ route('manage_student_classes.create') }}">Insert</a>
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
                        <a class="btn btn-primary" href="{{ route('manage_student_classes.edit', $studentClass->id) }}">Edit</a>
                    </th>
                    <th>
                        <form action="{{ route('manage_student_classes.destroy', $studentClass->id) }}" method="post">
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
