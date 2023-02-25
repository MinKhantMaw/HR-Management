@extends('layouts.app')
@section('title', 'Employees')
@section('content')
    <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            <table class="table" id="example">
                <thead>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('getDatatable') }}',
                columns: [{
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                    },
                    {
                        data: 'email',
                        name: 'email',
                    },
                ]
            });
        });
    </script>
@endsection
