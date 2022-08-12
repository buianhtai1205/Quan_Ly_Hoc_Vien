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
        @if ($count = 0)
            <div>
                <br>
                <h5 style="font-weight: bold; color: red;">System checked no list rooms</h5>
                <br>
                <meta name="csrf-token" content="{{ csrf_token() }}" />
                <label class="btn btn-primary mb-0" for="csv">
                    Import List Rooms
                </label>
                <input type="file" id="csv" name="csv" class="d-none" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
            </div>
        @else
            <form action="{{ route('teaching_assignments.assign') }}" method="post">
                @csrf
                <h5 style="font-weight: bold;">Assign automatic for all sections</h5>
                <br>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="inputYear">SchoolYear</label>
                        <input name="schoolYear" class="form-control" id="inputYear" type="text" required >
                    </div>
                    <div class="form-group col-md-3">
                        <label for="inputSemester">Semester</label>
                        <input name="semester" class="form-control" id="inputSemester" type="text" required >
                    </div>
                </div>
                <button class="btn btn-primary">Assign</button>
            </form>

        @endif


    </div>
@endsection
@push('js')
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
                    url: '{{ route('teaching_assignments.import_csv_room') }}',
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

