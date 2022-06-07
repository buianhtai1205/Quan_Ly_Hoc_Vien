@extends('layout.master')
@section('content')
    <h4>Insert</h4>
    <form action="{{ route('academics.store') }}" method="POST" enctype="multipart/form-data">
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
                <label for="example-email">Email</label>
                <input type="email" id="example-email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
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