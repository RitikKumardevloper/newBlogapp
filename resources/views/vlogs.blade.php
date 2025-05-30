@extends('layout.main')

@push('head')
    <!-- DataTables CSS -->
    <link href="https://cdn.datatables.net/1.13.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
@endpush

@section('content')
    <div class="container my-5">
        <h2 class="mb-4">All Blogs (Vlogs)</h2>
        <table id="vlogs-table" class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Posted On</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
@endsection

@push('scripts')
    <!-- jQuery (required) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#vlogs-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('vlogs.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'title', name: 'title' },
                    { data: 'desc', name: 'desc' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
        });
    </script>
@endpush