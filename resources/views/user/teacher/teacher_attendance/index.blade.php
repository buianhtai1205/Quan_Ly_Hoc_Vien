@extends('layout.user.master_academic')

@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Attendance
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
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <h5 style="color:red;">Date: {{ $date }}</h5>
        <form action="{{ route('teacher_attendances.attendance') }}" method="post">
            @csrf
            <input hidden type="text" name="date" value="{{ $date }}">
            <input hidden type="text" name="sectionID" value="{{ $sectionID }}">
            <table id="table-index" class="table table-striped dt-responsive">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Student ID</th>
                    <th>Student Name</th>
                    <th>Attendance</th>
                </tr>
                </thead>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->studentID }}</td>
                        <td>{{ $student->student->fullName }}</td>
                        <td>
                            <input id="{{ $student->studentID }}1"  type="radio" name="statuses[{{ $student->studentID }}]" value="1"
                                   @if($student->status == 1 || $student->status == 0)
                                       checked
                                   @endif >
                            <label for="{{ $student->studentID }}1">Đi học</label>
                            <input class="ml-5" id="{{ $student->studentID }}2" type="radio" name="statuses[{{ $student->studentID }}]" value="2"
                                   @if($student->status == 2)
                                       checked
                                   @endif >
                            <label for="{{ $student->studentID }}2">Vắng(KP)</label>
                            <input class="ml-5" id="{{ $student->studentID }}3" type="radio" name="statuses[{{ $student->studentID }}]" value="3"
                                   @if($student->status == 3)
                                       checked
                                   @endif >
                            <label for="{{ $student->studentID }}3">Vắng(P)</label>
                            <input class="ml-5" id="{{ $student->studentID }}4" type="radio" name="statuses[{{ $student->studentID }}]" value="4"
                                   @if($student->status == 4)
                                       checked
                                   @endif >
                            <label for="{{ $student->studentID }}4">Muộn</label>
                        </td>
                    </tr>
                @endforeach
            </table>

            <button class="btn btn-primary">Attendance</button>
        </form>


    </div>
@endsection

