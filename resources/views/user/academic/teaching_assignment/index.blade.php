@extends('admin.layout.master_academic')
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
        <h4 style="font-weight: bold; color: red;">List Sections Unassigned</h4>
        <form action="">

        </form>
        <a class="btn btn-success" href="{{ route('teaching_assignments.assign') }}">Assign</a>
        <br> <br>
        <table id="table-index" class="table table-striped dt-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>SectionID</th>
                <th>SubjectName</th>
                <th>TypeSection</th>
                <th>NumOfLesson</th>
                <th>TeacherID</th>
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
                    <td>{{ $section->typeSection }}</td>
                    <td>{{ $section->numOfLesson }}</td>
                    <td>
                        <select name="" id="">
                            <option value="">Giao Vien 1</option>
                            <option value="">Giao Vien 2</option>
                            <option value="">Giao Vien 3</option>
                        </select>
                    </td>
                    <td>{{ $section->beginDate }}</td>
                    <td>{{ $section->room }}</td>
                    <td>{{ $section->shift }}</td>
                </tr>
            @endforeach
        </table>
        <br>

    </div>
@endsection

