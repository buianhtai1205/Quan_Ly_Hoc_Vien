@extends('layout.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Section / Teaching Assignment
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
        <h4 style="font-weight: bold; color: red;">Select list section to assign</h4>
        <form action="{{ route('teaching_assignments.index') }}">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="subjectID">SubjectName : </label>
                    <select name="subjectID" id='subjectID' class="form-control" >
                        <option value="">--Select Subject--</option>
                        <option value="all">All subjects</option>
                        @foreach ($listSubjects as $subject)
                            <option value="{{ $subject->subjectID }}">{{ $subject->subject->subjectName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3" style="display: flex; align-items: center; justify-content: center;">
                    <button id="assignment" class="btn btn-success" style="height: 40px;">Select</button>
                </div>

            </div>

        </form>

    </div>
@endsection

