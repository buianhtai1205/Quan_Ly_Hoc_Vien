@extends('layout.admin.master')
@section('content')
    <h4>Insert</h4>
    <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">FullName</label>
                <input type="text" id="simpleinput" class="form-control" name="fullName" value="{{ old('fullName') }}">
            </div>
            <div class="form-group col-md-4">
                <label for="example-select">Gender</label>
                <select class="form-control" id="example-select" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="others">Others</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="example">TeacherID</label>
                <input type="text" id="example" name="teacherID" value="{{ old('teacherID') }}" class="form-control" placeholder="teacherID">
            </div>
            <div class="form-group col-md-4">
                <label for="password">Password</label>
                <div class="input-group input-group-merge">
                    <input name="password" type="password" id="password" class="form-control" placeholder="Enter your password">
                    <div class="input-group-append" data-password="false">
                        <div class="input-group-text">
                            <span class="password-eye"></span>
                        </div>
                    </div>
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
                <label for="inputFaculty">Faculty</label>
                <input name="faculty" value="{{ old('faculty') }}" type="text" class="form-control" id="inputFaculty" placeholder="Công nghệ thông tin">
            </div>
            <div class="form-group col-md-4">
                <label for="example-select">Level</label>
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
@endsection
