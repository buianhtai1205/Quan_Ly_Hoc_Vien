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
        <br>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Select Classroom</button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Attendance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="selectSubject">Subject</label>
                                <select name="subjectID" type="text" id="selectSubject" class="form-control">
                                    @foreach($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subjectName }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="selectLesson">Lesson</label>
                                <select name="lesson" type="text" id="selectLesson" class="form-control">

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div type="button" class="btn btn-secondary" data-dismiss="modal">Close</div>
                        <button type="button" class="btn btn-primary">Select</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Attendance -->
    </div>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>

        $('#selectSubject').change(function () {
            let subjectID = $('#selectSubject').val();
            $.ajax({
                url: "{{ route('academic_attendances.get_lesson') }}",
                type: "POST",
                data: {
                    subjectID: subjectID,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    $('#selectLesson').empty();
                    // for (let i = 0; i < data.length; i++) {
                    //     $('#selectLesson').append($('<option>').val(data[i].lesson).text(data[i].lesson));
                    // }
                }
            });
        });
    </script>
@endpush


