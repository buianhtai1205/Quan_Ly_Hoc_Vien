@extends('layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Student / Insert
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
        <form action="{{ route('manage_students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="example-select">ClassID</label>
                    <select class="form-control" id="example-select" name="classID">
                        <option value="">Chưa sắp lớp</option>
                        @foreach ($studentClasses as $studentClass)
                            <option value="{{ $studentClass->classID }}">{{ $studentClass->classID }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput">FullName</label>
                    <input type="text" id="simpleinput" class="form-control" name="fullName" value="{{ old('fullName') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="example-select">Gender</label>
                    <select class="form-control" id="example-select" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="example">StudentID</label>
                    <input type="text" id="example" name="studentID" value="{{ old('studentID') }}" class="form-control" placeholder="studentID">
                </div>
                <div class="form-group col-md-3">
                    <label for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="password">FacultyName</label>
                    <div class="input-group input-group-merge">
                        <input name="facultyName" value="{{ old('facultyName') }}" type="text"  class="form-control" placeholder="Enter your faculty name">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Address</label>
                    <input name="address" value="{{ old('address') }}" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group col-md-4">
                    <label for="simpleinput">Phone</label>
                    <input name="phoneNumber" value="{{ old('phoneNumber') }}" type="text" id="simpleinput" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="example-date">BirthDate</label>
                    <input class="form-control" id="example-date" type="date" name="birthDate" value="{{ old('birthDate') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="example-fileinput">Avatar</label>
                    <input name="avatar" value="{{ old('avatar') }}" type="file" id="example-fileinput" class="form-control-file">
                </div>
            </div>
            <button class="btn btn-success">Insert</button>
        </form>
    </div>
@endsection
