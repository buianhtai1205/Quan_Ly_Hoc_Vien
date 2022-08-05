@extends('admin.layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Section / Insert Multiple
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
        <form action="{{ route('manage_sections.store_multiple') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="example-select">SubjectName</label>
                    <select class="form-control" id="example-select" name="subjectID">
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->subjectID }}">{{ $subject->subjectName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleInput">TypeSection</label>
                    <input type="text" id="simpleInput" class="form-control" name="typeSection" value="{{ old('typeSection') }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="simpleInput">NumOfLesson</label>
                    <input name="numOfLesson" value="{{ old('numOfLesson') }}" type="text" id="simpleInput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleInput">Limit</label>
                    <input name="limit" value="{{ old('limit') }}" type="text" id="simpleInput" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="simpleInput">NumOfSection</label>
                    <input name="numOfSection" value="{{ old('numOfSection') }}" type="text" id="simpleInput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleInput">SchoolYear</label>
                    <input name="schoolYear" value="{{ old('schoolYear') }}" type="text" id="simpleInput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleInput">Semester</label>
                    <input name="semester" value="{{ old('semester') }}" type="text" id="simpleInput" class="form-control">
                </div>
            </div>

            <button class="btn btn-success">Insert</button>
        </form>
    </div>

@endsection
