@extends('layout.master')
@section('content')
    <h4>Sửa thông tin giáo vụ</h4>
    <form action="{{ route('academics.update', $academic) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="simpleinput">Họ tên</label>
                <input type="text" id="simpleinput" class="form-control" name="fullName" value="{{ $academic->fullName }}">
            </div>
            <div class="form-group col-md-4">
                <label for="example-select">Giới tính</label>
                <select class="form-control" id="example-select" name="gender">
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                    <option value="others">Khác</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="example-email">Email</label>
                <input type="email" id="example-email" name="email" value="{{ $academic->email }}" class="form-control" placeholder="Email">
            </div>
            <div class="form-group col-md-4">
                <label for="password">Mật khẩu</label>
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
                <label for="inputAddress">Địa chỉ</label>
                <input name="address" value="{{ $academic->address }}" type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group col-md-4">
                <label for="simpleinput">Số điện thoại</label>
                <input name="phoneNumber" value="{{ $academic->phoneNumber }}" type="text" id="simpleinput" class="form-control">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="example-date">Ngày sinh</label>
                <input class="form-control" id="example-date" type="date" name="birthDate" value="{{ $academic->birthDate }}">
            </div>
            <div class="form-group col-md-4">
                <label for="example-fileinput">Ảnh đại diện</label>
                <input name="avatar" value="{{ $academic->avatar }}" type="file" id="example-fileinput" class="form-control-file">
            </div>
        </div>
        <button class="btn btn-success">Sửa</button>
    </form>
@endsection
