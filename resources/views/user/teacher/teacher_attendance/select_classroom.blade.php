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
        <form action="{{ route('teacher_attendances.index') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="select_subject">Subject</label>
                    <select name="subjectID" id="select_subject" class="form-control">
                        <option value="">---Select subject---</option>
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->subjectID }}">{{ $subject->subject->subjectName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="select_section">Section</label>
                    <select name="sectionID" id="select_section" class="form-control">
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="select_week">Week</label>
                    <select name="date" id="select_week" class="form-control">
                    </select>
                </div>
            </div>
            <button class="btn btn-primary">Select</button>
        </form>
    </div>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#select_subject').change(function(){
                var subjectID = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('teacher_attendances.api_section') }}',
                    data: {
                        subjectID: subjectID,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#select_section').empty();
                        $('#select_section').append('<option value="">---Select section---</option>');
                        for (let i = 0; i < data.length; i++) {
                            $('#select_section').append($('<option>').val(data[i].sectionID).text(data[i].sectionID + ' - ' + data[i].beginDate + ' - Shift '  + data[i].shift));
                        }
                    }
                });
            });

            $('#select_section').change(function(){
                var sectionID = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '{{ route('teacher_attendances.api_week') }}',
                    data: {
                        sectionID: sectionID,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        $('#select_week').empty();
                        $('select_week').append($('<option>').val('').text('---Select week---'));
                        for (let i = 0; i < data.length; i++) {
                            $('#select_week').append($('<option>').val(data[i].date).text('Week ' + (i+1) + ' (' + data[i].date + ')'));
                        }
                    }
                });
            });
        });
    </script>
@endpush
