@extends('admin.layout.master')
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <a class="btn btn-success" href="{{ route('admin.subjects.create') }}">Insert</a>
    <br> <br>
    <table id="table-index" class="table table-striped dt-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>SubjectID</th>
            <th>SubjectName</th>
            <th>NumOfCredits</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        @foreach($subjects as $subject)
            <thead>
            <tr>
                <th>{{ $subject->id }}</th>
                <th>{{ $subject->subjectID }}</th>
                <th>{{ $subject->subjectName }}</th>
                <th>{{ $subject->numOfCredits }}</th>
                <th>
                    <a class="btn btn-primary" href="{{ route('admin.subjects.edit', $subject->id) }}">Edit</a>
                </th>
                <th>
                    <form action="{{ route('admin.subjects.destroy', $subject->id) }}" method="post">
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
