@extends('layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Section / Update
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
        <form action="{{ route('manage_sections.update', $section) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="simpleinput">SectionID</label>
                    <input type="text" id="simpleinput" class="form-control" name="sectionID" value="{{ $section->sectionID }}">
                </div>
                <div class="form-group col-md-3">
                    <label for="example-select">SubjectID</label>
                    <select class="form-control" id="example-select" name="subjectID">
                        @foreach ($subjects as $subject)
                            <option @if ($subject->subjectID === $section->subjectID) selected @endif
                            value="{{ $subject->subjectID }}">{{ $subject->subjectName }} - {{ $subject->subjectID }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput">TypeSection</label>
                    <input type="text" id="simpleinput" class="form-control" name="typeSection" value="{{ $section->typeSection }}">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="simpleinput">NumOfLesson</label>
                    <input name="numOfLesson" value="{{ $section->numOfLesson }}" type="text" id="simpleinput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput">Limit</label>
                    <input name="limit" value="{{ $section->limit }}" type="text" id="simpleinput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput">TeacherID</label>
                    <input name="teacherID" value="{{ $section->teacherID }}" type="text" id="simpleinput" class="form-control">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="simpleinput">BeginDate</label>
                    <input name="beginDate" value="{{ $section->beginDate }}" type="text" id="simpleinput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput">Room</label>
                    <input name="room" value="{{ $section->room }}" type="text" id="simpleinput" class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="simpleinput">Shift</label>
                    <input name="shift" value="{{ $section->shift }}" type="text" id="simpleinput" class="form-control">
                </div>
            </div>

            <button class="btn btn-success">Update</button>
        </form>
    </div>

@endsection
