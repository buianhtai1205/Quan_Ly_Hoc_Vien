@extends('layout.master')
@section('content')
    <h4>Update</h4>
    <form action="{{ route('admin.academics.update', $academic) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">FullName</label>
                <input type="text" id="simpleinput" class="form-control" name="fullName" value="{{ $academic->fullName }}">
            </div>
            <div class="form-group col-md-4">
                <label for="example-select">Gender</label>
                <select class="form-control" id="example-select" name="gender">
                    <option @if($academic->gender === 'male') selected @endif value="male">Male</option>
                    <option @if($academic->gender === 'female') selected @endif value="female">Female</option>
                    <option @if($academic->gender === 'others') selected @endif value="others">Others</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="example">AcademicID</label>
                <input type="text" id="example" name="academicID" value="{{ $academic->academicID }}" class="form-control" placeholder="academicID">
            </div>
            <div class="form-group col-md-4">
                <label for="password">Password</label>
                <div class="input-group input-group-merge">
                    <input name="password" value="{{ $academic->password }}" type="password" id="password" class="form-control" placeholder="Enter your password">
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
                <input name="address" value="{{ $academic->address }}" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group col-md-4">
                <label for="simpleinput">Phone</label>
                <input name="phoneNumber" value="{{ $academic->phoneNumber }}" type="text" id="simpleinput" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="example-date">BirthDate</label>
                <input class="form-control" id="example-date" type="date" name="birthDate" value="{{ $academic->birthDate }}">
            </div>
            <div class="form-group col-md-4">
                <label for="example-fileinput">Avatar</label>
                <input name="avatar" value="{{ $academic->avatar }}" type="file" id="example-fileinput" class="form-control-file">
            </div>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
@endsection
