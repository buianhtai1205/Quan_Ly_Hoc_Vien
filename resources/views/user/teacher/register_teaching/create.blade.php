@extends('layout.user.master_academic')

@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Register For Teaching / Insert
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
        <form action="{{ route('register_teachings.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="simpleInput">SchoolYear</label>
                    <input required name="schoolYear" value="{{ old('schoolYear') }}" type="text" id="simpleInput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleInput">Semester</label>
                    <input required name="semester" value="{{ old('semester') }}" type="text" id="simpleInput" class="form-control">
                </div>
            </div>

            <div class="form-row">
                @foreach($faculty_subjects as $each)
                    <div class="form-group col-md-2">
                        <label for="simpleInput">{{ $each->subject->subjectName }}</label>
                        <input hidden type="text" name="subjectIDs[]" value="{{ $each->subjectID }}">
                        <input name="numOfSections[]"  type="number" id="simpleInput" class="form-control" value="0">
                    </div>
                @endforeach
            </div>

            <button class="btn btn-success">Register</button>
        </form>
    </div>
@endsection
