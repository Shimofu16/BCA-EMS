@extends('admin.registrar-layouts.index')
@section('page-title')
    Enrolled student
@endsection

@section('contents')
    @livewire('registrar-dashboard.enrolled.index', [
        'students' => $students,
        'gradeLevels' => $gradeLevels
    ])
@endsection
@section('dashboard-javascript')
    <script>
        // Call the dataTables jQuery plugin
        $(document).ready(function() {
            $('#enrolled-table').DataTable({
                "ordering": false
            });
        });
    </script>
@endsection
