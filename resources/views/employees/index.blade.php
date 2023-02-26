@extends('layouts.app')
@section('title', 'Employees')
@section('content')
    <div class="">
        <a href="{{ route('employees.create') }}" class="btn btn-success btn-theme btn-sm"><i class="fas fa-plus-circle"></i>
            Create Employee</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                    <td class="text-center">ID</td>
                    <th class="text-center">Name</th>
                    <th class="text-center">Phone</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Department</th>
                    <th class="text-center">Is Present</th>
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
                        data: 'id',
                        name: 'id',
                        class: 'text-center',
                    },
                    {
                        data: 'name',
                        name: 'name',
                        class: 'text-center',
                    },
                    {
                        data: 'phone',
                        name: 'phone',
                        class: 'text-center',
                    },
                    {
                        data: 'email',
                        name: 'email',
                        class: 'text-center',
                    },
                    {
                        data: 'department_name',
                        name: 'department_name',
                        class: 'text-center',
                    },
                    {
                        data: 'is_present',
                        name: 'is_present',
                        class: 'text-center',
                    }
                ]
            });
        });
    </script>
@endsection
