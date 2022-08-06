@extends('layout.user.master_academic')

@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Register For Teaching
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
        <a class="btn btn-success" href="{{ route('register_teachings.create') }}">Insert</a>
        <br> <br>
        <table id="table-index" class="table table-striped dt-responsive">
            <thead>
            <tr>
                <th>SubjectID</th>
                <th>NumOfSection</th>
                <th>SchoolYear</th>
                <th>Semester</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            @foreach($register_teachings as $register_teaching)
                <tr>
                    <td>{{ $register_teaching->subjectID }}</td>
                    <td>{{ $register_teaching->numOfSection }}</td>
                    <td>{{ $register_teaching->schoolYear }}</td>
                    <td>{{ $register_teaching->semester }}</td>
                    <td>
                        <form action="{{ route('register_teachings.edit') }}" method="post">
                            @csrf
                            <input hidden type="text" name="subjectID" value="{{ $register_teaching->subjectID }}">
                            <button class="btn btn-primary">Edit</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('register_teachings.destroy') }}" method="post">
                            @csrf
                            <input hidden type="text" name="subjectID" value="{{ $register_teaching->subjectID }}">
                            <button class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
