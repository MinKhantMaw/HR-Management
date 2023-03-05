@extends('layouts.app')
@section('title', 'Employees')
@section('content')
    <div class="">
        <a href="{{ route('employees.create') }}" class="btn btn-success btn-theme btn-sm"><i class="fas fa-plus-circle"></i>
            Create Employee</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table  table-bordered" id="example" style="width: 100%">
                <thead>
                    <td class="text-center no-sort no-search"></td>
                    <td class="text-center no-sort">Employee ID</td>
                    <th class="text-center no-sort">Name</th>
                    <th class="text-center no-sort">Phone</th>
                    <th class="text-center no-sort">Email</th>
                    <th class="text-center no-sort">Department</th>
                    <th class="text-center no-sort">Is Present</th>
                    <th class="text-center no-sort">Action</th>
                    <th class="text-center no-sort no-search hidden">Updated at</th>
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
                responsive: true,
                ajax: '{{ route('getDatatable') }}',
                columns: [{
                        data: 'plus-icon',
                        name: 'plus-icon',
                        class: 'text-center',
                    },
                    {
                        data: 'employee_id',
                        name: 'employee_id',
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
                    },
                    {
                        data: 'action',
                        name: 'action',
                        class: 'text-center',
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        class: 'text-center',
                    }
                ],
                order: [
                    [
                        8, 'desc',
                    ]
                ],
                columnDefs: [{
                        target: 8,
                        visible: false,
                    },
                    {
                        target: 0,
                        class: "control",
                    },
                    {
                        target: "no-sort",
                        orderable: false,
                    },
                    {
                        target: "no-search",
                        searchable: false,
                    },
                ],
                language: {
                    processing: "<p class='my-3'>Loading... </p>",
                }
            });

            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                swal({
                        text: "Are you sure? You want to delete this Employee?",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {

                        }
                    });
            });
        });
    </script>
@endsection
