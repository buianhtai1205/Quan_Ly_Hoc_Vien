@extends('layout.user.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Teacher / Update
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
        <form action="{{ route('manage_teachers.update', $teacher) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="example"><b>TeacherID</b></label>
                    <input type="text" id="example" name="teacherID" value="{{ $teacher->teacherID }}" class="form-control" placeholder="teacherID">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput"><b>FullName</b></label>
                    <input type="text" id="simpleinput" class="form-control" name="fullName" value="{{ $teacher->fullName }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="example-select"><b>Gender</b></label>
                    <select class="form-control" id="example-select" name="gender">
                        <option @if($teacher->gender === 'male') selected @endif value="male">Male</option>
                        <option @if($teacher->gender === 'female') selected @endif value="female">Female</option>
                        <option @if($teacher->gender === 'others') selected @endif value="others">Others</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="password">Password</label>
                    <div class="input-group input-group-merge">
                        <input name="password" value="{{ $teacher->password }}" type="password" id="password" class="form-control" placeholder="Enter your password">
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputAddress"><b>Address</b></label>
                    <input name="address" value="{{ $teacher->address }}" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput"> <b>Phone</b> </label>
                    <input name="phoneNumber" value="{{ $teacher->phoneNumber }}" type="text" id="simpleinput" class="form-control">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputFaculty"><b>Faculty</b></label>
                    <input name="faculty" value="{{  $teacher->faculty }}" type="text" class="form-control" id="inputFaculty" placeholder="Công nghệ thông tin">
                </div>
                <div class="form-group col-md-4">
                    <label for="example-select"><b>Level</b></label>
                    <select class="form-control" id="example-select" name="level">
                        <option @if($teacher->gender === 'Master') selected @endif value="Master">Master</option>
                        <option @if($teacher->gender === 'PhD') selected @endif value="PhD">PhD</option>
                        <option @if($teacher->gender === 'Asscociate Professor') selected @endif value="Asscociate Professor">Asscociate Professor</option>
                        <option @if($teacher->gender === 'Professor') selected @endif value="Professor">Professor</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="example-date">BirthDate</label>
                    <input class="form-control" id="example-date" type="date" name="birthDate" value="{{ $teacher->birthDate }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="example-fileinput">Avatar</label>
                    <input name="avatar" value="{{ $teacher->avatar }}" type="file" id="example-fileinput" class="form-control-file">
                </div>
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>

@endsection
