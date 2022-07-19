@extends('layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Mannage Teacher / Insert
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
        <form action="{{ route('manage_teachers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="example"><b>TeacherID</b></label>
                    <input type="text" id="example" name="teacherID" value="{{ old('teacherID') }}" class="form-control" placeholder="teacherID">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput"><b>FullName</b></label>
                    <input type="text" id="simpleinput" class="form-control" name="fullName" value="{{ old('fullName') }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="example-select"><b>Gender</b></label>
                    <select class="form-control" id="example-select" name="gender">
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="password"><b>Password</b></label>
                    <div class="input-group input-group-merge">
                        <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress"><b>Address</b></label>
                    <input name="address" value="{{ old('address') }}" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput"><b>Phone</b></label>
                    <input name="phoneNumber" value="{{ old('phoneNumber') }}" type="text" id="simpleinput" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputFaculty"><b>Faculty</b></label>
                    <input name="faculty" value="{{ old('faculty') }}" type="text" class="form-control" id="inputFaculty" placeholder="Công nghệ thông tin">
                </div>
                <div class="form-group col-md-4">
                    <label for="example-select"><b>Level</b></label>
                    <select class="form-control" id="example-select" name="level">
                        <option value="Master">Master</option>
                        <option value="PhD">PhD</option>
                        <option value="Asscociate Professor">Asscociate Professor</option>
                        <option value="Professor">Professor</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="example-date"><b>BirthDate</b></label>
                    <input class="form-control" id="example-date" type="date" name="birthDate" value="{{ old('birthDate') }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="example-fileinput"><b>Avatar</b></label>
                    <input name="avatar" value="{{ old('avatar') }}" type="file" id="example-fileinput" class="form-control-file">
                </div>
            </div>
            <button class="btn btn-success">Insert</button>
        </form>
    </div>

@endsection
