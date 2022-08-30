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
        @if( $count > 0 )
            <a class="btn btn-success" href="{{ route('teaching_assignments.assignment') }}">Assign</a>
        @endif
        @if ($count === 0)
            <a class="btn btn-primary btn-browse" href="{{ route('teaching_assignments.browse') }}">Browse</a>
        @endif
        <br> <br>
        @if($countSectionNotAccept > 0)
                <div class="alert alert-warning">
                    <strong>Warning!</strong> You have {{ $countSectionNotAccept }} section(s) not accepted.
                </div>
        @endif

        @if($countSectionNotAccept === 0 && $countSectionNotBrowse > 0)
            <div class="alert alert-success">
                <strong>Success! </strong>All section(s) accepted.
            </div>
        @endif

        @if($countSectionNotBrowse === 0)
            <div class="alert alert-success">
                <strong>Success! </strong>All section(s) browsed.
            </div>
        @endif
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
                </tr>
            @endforeach
        </table>
        {{ $sections->links() }}
    </div>
@endsection
@push('js')
<script>
        const countSectionNotBrowse = {{ $countSectionNotBrowse }};
        if (countSectionNotBrowse === 0) {
            document.getElementsByClassName('btn-browse')[0].style.display = 'none';
        }
</script>
@endpush

