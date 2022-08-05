@extends('admin.layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Student / Update
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
        <form action="{{ route('manage_students.update', $student) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="example-select">ClassID</label>
                    <select class="form-control" id="example-select" name="classID">
                        <option value="">Chưa sắp lớp</option>
                        @foreach ($studentClasses as $studentClass)
                            <option @if ($studentClass->classID === $student->classID) selected
                                    @endif value="{{ $studentClass->classID }}">{{ $studentClass->classID }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput">FullName</label>
                    <input type="text" id="simpleinput" class="form-control" name="fullName" value="{{ $student->fullName }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="example-select">Gender</label>
                    <select class="form-control" id="example-select" name="gender">
                        <option @if($student->gender === 'male') selected @endif value="male">Male</option>
                        <option @if($student->gender === 'female') selected @endif value="female">Female</option>
                        <option @if($student->gender === 'others') selected @endif value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="example">StudentID</label>
                    <input type="text" id="example" name="studentID" value="{{ $student->studentID }}" class="form-control" placeholder="studentID">
                </div>
                <div class="form-group col-md-3">
                    <label for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input name="password" value="{{ $student->password }}" type="password" id="password" class="form-control" placeholder="Enter your password">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="example">FacultyName</label>
                    <input type="text" id="example" name="facultyName" value="{{ $student->facultyName }}" class="form-control" placeholder="studentID">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputAddress">Address</label>
                    <input name="address" value="{{ $student->address }}" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group col-md-4">
                    <label for="simpleinput">Phone</label>
                    <input name="phoneNumber" value="{{ $student->phoneNumber }}" type="text" id="simpleinput" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="example-date">BirthDate</label>
                    <input class="form-control" id="example-date" type="date" name="birthDate" value="{{ $student->birthDate }}">
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>


@endsection
