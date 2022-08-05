@extends('admin.layout.master_academic')

@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Divide Class Student
    </div>



    {{--  Content  --}}
    <div class="content-main">
        <form action="{{ route('divide_class_students.index') }}">
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="course">Course : </label>
                    <select name="course" id='course' class="form-control" >
                        <option value="">--Select Course--</option>
                        @foreach ($courses as $course)
                            <option @if ($course->courseID === $courseCurrent) selected @endif
                                value="{{ $course->courseID }}">{{ $course->courseName }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-md-3">
                    <label for="faculty">Faculty : </label>
                    <select name="faculty" id='faculty' class="form-control" >
                        <option value="all">--Tất cả--</option>
                        @foreach ($faculties as $faculty)
                            <option @if ($faculty->facultyName === $facultyCurrent) selected @endif
                                value="{{ $faculty->facultyName }}">{{ $faculty->facultyName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3" style="display: flex; align-items: center; justify-content: center;">
                    <button class="btn btn-success" style="height: 40px;">Select</button>
                </div>

            </div>

        </form>

        <div>
            <label for="">Sum of students:</label>
            <b>{{ $sum }} students</b>
        </div>

        <form action="{{ route('divide_class_students.divideClass') }}">
            {{--    Start Hidden group     --}}
            <div class="form-group col-md-3 d-none">
                <label for="course">Course : </label>
                <input type="text" name="course" id='course' value="{{ $courseCurrent }}">
            </div>

            <div class="form-group col-md-3 d-none">
                <label for="faculty">Faculty : </label>
                <input type="text" name="faculty" id='faculty' value="{{ $facultyCurrent }}">
            </div>
            {{--    End Hidden group     --}}

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="numStudentOneClass">Num of students for one class: </label>
                    <select name="numStudentOneClass" id="numStudentOneClass" class="form-control" >
                        <option value="20">20</option>
                        <option value="30">30</option>
                        <option value="50">50</option>
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="numClass">Num of class: </label>
                    <input type="text" id="numClass" name="numClass" value="{{ old('numClass') }}" class="form-control" >
                </div>
            </div>

            <button class="btn btn-success">Divide</button>
        </form>
    </div>
@endsection
@push('js')
    <script>
        // calculator num class when enter num student in one class
        var inputNumStudent = document.getElementById("numStudentOneClass");
        inputNumStudent.onblur = function() {
            var numStudentOneClass = inputNumStudent.value;
            var numClass = parseInt({{ $sum }})/ parseInt(numStudentOneClass);
            document.querySelector('input[name="numClass"]').value = Math.floor(numClass);
        };

        // calculator num student in one class when enter num class
        var inputNumClass = document.querySelector('input[name="numClass"]');
        inputNumClass.onblur = function() {
            var numClass = inputNumClass.value;
            var numStudent = parseInt({{ $sum }})/ parseInt(numClass);
            document.getElementById("numStudentOneClass").value = Math.floor(numStudent);
        };

    </script>
@endpush

