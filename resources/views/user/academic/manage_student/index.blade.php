@extends('layout.user.master_academic')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Manage Student
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
        <div class="form-row">
            <div class="form-group col-md-3">
                <label><strong>Course :</strong></label>
                <select id='course' class="form-control" style="width: 200px;">
                    <option value="">--Select Course--</option>
                    @foreach ($courses as $course)
                        <option value="{{ $course->courseID }}">{{ $course->courseName }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-3">
                <label><strong>Faculty :</strong></label>
                <select id='faculty' class="form-control" style="width: 200px;">
                    <option value="">--Select Faculty--</option>
                    @foreach ($faculties as $faculty)
                        <option value="{{ $faculty->facultyName }}">{{ $faculty->facultyName }}</option>
                    @endforeach
                </select>
            </div>
        </div>




        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <a class="btn btn-success" href="{{ route('manage_students.create') }}">Insert</a>
        <label class="btn btn-primary mb-0" for="csv">
            Import CSV
        </label>
        <input type="file" id="csv" name="csv" class="d-none" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
        <br> <br>
        <table id="table-index" class="table table-striped dt-responsive">
            <thead>
            <tr>
                <th>#</th>
                <th>StudentID</th>
                <th>FullName</th>
                <th>FacultyName</th>
                <th>BirthDate</th>
                <th>Gender</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>

        </table>
    </div>

@endsection
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $('#table-index').DataTable({
                dom: 'Blfrtip',
                select: true,
                buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: ':visible :not(.not-export)'
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: ':visible :not(.not-export)'
                        }
                    },
                    {
                        extend: 'pdf',
                        exportOptions: {
                            columns: ':visible :not(.not-export)'
                        }
                    },
                    {
                        extend: 'copy',
                        exportOptions: {
                            columns: ':visible :not(.not-export)'
                        }
                    },
                    'colvis'
                ],
                columnDefs: [ {
                    className: 'not-export',
                    "targets": [7, 8]
                } ],
                processing: true,
                serverSide: true,
                lengthMenu: [ 5, 10, 15, 20, 25 ],
                ajax: {
                    url: "{{ route('manage_students.api') }}",
                    data: function (d) {
                        d.course = $('#course').val();
                        d.faculty = $('#faculty').val();
                    }
                },
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'studentID', name: 'studentID'},
                    { data: 'fullName', name: 'fullName' },
                    { data: 'facultyName', name: 'facultyName'},
                    { data: 'birthDate', name: 'birthDate' },
                    { data: 'gender', name: 'gender' },
                    { data: 'address', name: 'address' },
                    { data: 'phoneNumber', name: 'phoneNumber' },
                    {
                        data: 'edit',
                        name: 'edit',
                        orderable: false,
                        searchable: false,
                        render: function (data) {
                            return `<a class="btn btn-primary" href="${data}">Edit</a>`
                        }
                    },
                    {
                        data: 'delete',
                        name: 'delete' ,
                        orderable: false,
                        searchable: false,
                        render: function ( data) {
                            return `
                                <form action="${data}} " method="post">
                                @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Delete</button>
                            </form>
                            `
                        }
                    },
                ]
            });
            $("#select-name").change(function () {
                table.column(1).search( this.value ).draw();
            } );
            $('#course').change(function(){
                $('#table-index').DataTable().ajax.reload();
            });
            $('#faculty').change(function(){
                $('#table-index').DataTable().ajax.reload();
            });
            $("#csv").change(function(event) {
                var formData = new FormData();
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: '{{ route('manage_students.import_csv') }}',
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
