@extends('layout.user.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Education Program
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
        <label class="btn btn-primary mb-0" for="csv">
            Import CSV
        </label>
        <input type="file" id="csv" name="csv" class="d-none" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
        <br> <br>
        <form action="{{ route('manage_education_programs.index') }}" method="get">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="selectCourse">Course: </label>
                    <select name="courseID" id="selectCourse" class="form-control">
                        @foreach($courses as $item)
                            <option @if($courseIDOld === $item->courseID) selected @endif
                                value="{{$item->courseID}}">{{$item->courseName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="selectFaculty">Faculty: </label>
                    <select name="facultyID" id="selectFaculty" class="form-control">
                        @foreach($faculties as $item)
                            <option @if($facultyIDOld === $item->facultyID) selected @endif
                                value="{{$item->facultyID}}">{{$item->facultyName}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="selectSemester">Semester: </label>
                    <select name="semester" id="selectSemester" class="form-control">
                        <option @if($semesterOld === 1) selected @endif
                            value="1">1</option>
                        <option @if($semesterOld === 2) selected @endif
                            value="2">2</option>
                        <option @if($semesterOld === 3) selected @endif
                            value="3">3</option>
                        <option @if($semesterOld === 4) selected @endif
                            value="4">4</option>
                        <option @if($semesterOld === 5) selected @endif
                            value="5">5</option>
                        <option @if($semesterOld === 6) selected @endif
                            value="6">6</option>
                        <option @if($semesterOld === 7) selected @endif
                            value="7">7</option>
                        <option @if($semesterOld === 8) selected @endif
                            value="8">8</option>
                    </select>
                </div>
                <div style="margin-top: 30px;" class="form-group col-md-3">
                    <button style="width: 100px;" class="btn btn-success ">Select</button>
                </div>
            </div>
        </form>
        <div>
            <table id="table-index" class="table table-striped dt-responsive">
                <tr>
                    <th>CourseName</th>
                    <th>FacultyName</th>
                    <th>SubjectName</th>
                    <th>Semester</th>
{{--                    <th>Edit</th>--}}
{{--                    <th>Delete</th>--}}
                </tr>
                @foreach($education_programs as $each)
                    <tr>
                        <td>{{ $each->course->courseName }}</td>
                        <td>{{ $each->faculty->facultyName }}</td>
                        <td>{{ $each->subjectName }}</td>
                        <td>{{ $each->semester }}</td>
{{--                        <td>EditButton</td>--}}
{{--                        <td>DeleteButton</td>--}}
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $("#csv").change(function(event) {
                var formData = new FormData();
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: '{{ route('manage_education_programs.import_csv') }}',
                    type: 'POST',
                    dataType: 'json',
                    enctype: 'multipart/form-data',
                    data: formData,
                    async: false,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        swal("Well Done!", "Imported Successfully!", "success");
                    },
                    error: function (response) {
                        swal("Error!", "Imported Data Failed", "error");
                    },
                });
            });
        });
    </script>
@endpush
