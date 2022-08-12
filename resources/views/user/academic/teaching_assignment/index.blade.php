@extends('layout.user.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Teaching Assignment
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
        <a class="btn btn-success" href="{{ route('teaching_assignments.assignment') }}">Assign</a>
        <br>
        <table id="table-index" class="table table-striped dt-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>SectionID</th>
                <th>SubjectName</th>
                <th>TeacherName</th>
                <th>BeginDate</th>
                <th>Room</th>
                <th>Shift</th>
            </tr>
            </thead>
            @foreach($sections as $section)
                <tr >
                    <td>{{ $section->id }}</td>
                    <td>{{ $section->sectionID }}</td>
                    <td>{{ $section->subject->subjectName }}</td>
                    <td>{{ $section->teacher->fullName ?? '' }}</td>
                    <td>{{ $section->beginDate ?? '' }}</td>
                    <td>{{ $section->room ?? '' }}</td>
                    <td>{{ $section->shift ?? '' }}</td>
                </tr>
            @endforeach
        </table>
        {{ $sections->links() }}
    </div>
@endsection

