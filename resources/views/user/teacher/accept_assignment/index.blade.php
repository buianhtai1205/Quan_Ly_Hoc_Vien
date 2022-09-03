@extends('layout.user.master_academic')
@section('content')
    {{--  Title  --}}
    <div class="content-title">
        <i class="fa-solid fa-angles-right icon-sidebar"></i>Accept Assignment
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
        <a href="{{ route('accept_assignments.accept') }}" class="btn btn-success">Accept All</a>
        <br> <br>
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
                <th>Change</th>
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
                    <td>
                        <a id="formButton" style="font-size: 24px; color: blue;" href="" data-toggle="modal" data-target="#exampleModal{{ $section->id }}">
                            <i class="fa-solid fa-pen-fancy icon-sidebar"></i>
                        </a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{ $section->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $section->id }}">Edit Assignment {{ $section->sectionID ?? '' }}</option></h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('accept_assignments.update') }}" method="post">
                                        @csrf
                                        <div class="modal-body">
                                            <input hidden type="text" name="sectionID" value="{{ $section->sectionID }}">
                                            <input hidden type="text" name="beginDateOld" value="{{ $section->beginDate }}">
                                            <input hidden type="text" name="roomNameOld" value="{{ $section->room }}">
                                            <input hidden type="text" name="shiftOld" value="{{ $section->shift }}">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label for="selectBeginDate{{ $section->id }}">BeginDate</label>
                                                    <select name="beginDate" type="text" id="selectBeginDate{{ $section->id }}" class="form-control">
                                                        <option id="myElementDate{{ $section->id }}" value="">--Select Date--</option>
                                                        @foreach($dates as $date)
                                                            <option value="{{ $date->beginDate }}">{{ $date->beginDate }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="selectRoomName{{ $section->id }}">Room</label>
                                                    <select name="roomName" type="text" id="selectRoomName{{ $section->id }}" class="form-control">
                                                        <option id="myElementRoom{{ $section->id }}" value="">--Select Room--</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label for="selectShift{{ $section->id }}">Shift</label>
                                                    <select name="shift" type="text" id="selectShift{{ $section->id }}" class="form-control">
                                                        <option id="myElementShift{{ $section->id }}" value="">--Select Shift--</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <div class="btn btn-secondary" data-dismiss="modal">Close</div>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        @foreach($sections as $section)
        $('#selectBeginDate{{ $section->id }}').change(function() {
            let beginDate = $('#selectBeginDate{{ $section->id }}').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('accept_assignments.api_room') }}',
                data: {
                    beginDate: beginDate,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#selectRoomName{{ $section->id }}').empty();
                    for (let i = 0; i < data.length; i++) {
                        $('#selectRoomName{{ $section->id }}').append($('<option>').val(data[i].roomName).text(data[i].roomName));
                    }
                }
            });
        });

        $('#selectRoomName{{ $section->id }}').change(function() {
            let beginDate = $('#selectBeginDate{{ $section->id }}').val();
            let roomName = $('#selectRoomName{{ $section->id }}').val();
            $.ajax({
                type: 'POST',
                url: '{{ route('accept_assignments.api_shift') }}',
                data: {
                    beginDate: beginDate,
                    roomName: roomName,
                    _token: $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    $('#selectShift{{ $section->id }}').empty();
                    for (let i = 0; i < data.length; i++) {
                        $('#selectShift{{ $section->id }}').append($('<option>').val(data[i].shift).text(data[i].shift));
                    }
                }
            });
        });
        @endforeach
    </script>
@endpush
