@extends('admin.layout.master_academic')

@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Register For Teaching / Update
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
        <form action="{{ route('register_teachings.update') }}" method="POST">
            @csrf
            <div class="form-row">
                <input hidden name="teacherID" value="{{ $register_teaching->teacherID }}" type="text" id="simpleInput" class="form-control">
                <div class="form-group col-md-3">
                        <label for="simpleInput">SchoolYear</label>
                        <input required name="schoolYear" value="{{ $register_teaching->schoolYear }}" type="text" id="simpleInput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleInput">Semester</label>
                    <input required name="semester" value="{{ $register_teaching->semester }}" type="text" id="simpleInput" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="simpleInput">SubjectID</label>
                    <input name="subjectID" type="text" id="simpleInput" class="form-control" value="{{ $register_teaching->subjectID }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleInput">Num of Section</label>
                    <input name="numOfSection"  type="number" id="simpleInput" class="form-control" value="{{ $register_teaching->numOfSection }}">
                </div>
            </div>

            <button class="btn btn-success">Update</button>
        </form>
    </div>
@endsection
