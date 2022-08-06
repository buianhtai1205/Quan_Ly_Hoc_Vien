@extends('layout.admin.master')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush
@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <a class="btn btn-success" href="{{ route('admin.sections.create') }}">Insert</a>

    <br> <br>
    <table id="table-index" class="table table-striped dt-responsive">
        <thead>
        <tr>
            <th>#</th>
            <th>SectionID</th>
            <th>SubjectName</th>
            <th>TypeSection</th>
            <th>BeginDate</th>
            <th>NumOfLesson</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>

    </table>
@endsection
@push('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.11.5/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/date-1.1.2/fc-4.0.2/fh-3.2.2/r-2.2.9/rg-1.1.4/sc-2.0.5/sb-1.3.2/sl-1.3.4/datatables.min.js"></script>
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
                    "targets": [6, 7]
                } ],
                processing: true,
                serverSide: true,
                lengthMenu: [ 5, 10, 15, 20, 25 ],
                ajax: '{!! route('admin.sections.api') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'sectionID', name: 'sectionID'},
                    { data: 'subjectName', name: 'subjectName' },
                    { data: 'typeSection', name: 'typeSection' },
                    { data: 'beginDate', name: 'beginDate' },
                    { data: 'numOfLesson', name: 'numOfLesson' },
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

        });
    </script>
@endpush
