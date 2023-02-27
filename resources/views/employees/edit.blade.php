@extends('layouts.app')
@section('title', 'Edit Employee')
@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('employees.update', $employee->id) }}" method="POST" id="edit-form">
                @csrf
                @method('PUT')
                <div class="md-form">
                    <label for="">Employee ID</label>
                    <input type="text" name="employee_id" value="{{ $employee->employee_id }}" class="form-control"
                        autocomplete="off">
                </div>
                <div class="md-form">
                    <label for="">Name</label>
                    <input type="text" name="name" value="{{ $employee->name }}" class="form-control"
                        autocomplete="off">
                </div>
                <div class="md-form">
                    <label for="">Email</label>
                    <input type="text" name="email" value="{{ $employee->email }}" class="form-control"
                        autocomplete="off">
                </div>
                <div class="md-form">
                    <label for="">Phone</label>
                    <input type="number" name="phone" value="{{ $employee->phone }}" class="form-control"
                        autocomplete="off">
                </div>
                <div class="md-form">
                    <label for="">NRC Number</label>
                    <input type="text" name="nrc_number" value="{{ $employee->nrc_number }}" class="form-control"
                        autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Gender</label>
                    <select class="form-control" name="gender">
                        <option value="male" @if ($employee->gender == 'male') selected @endif>Male</option>
                        <option value="female" @if ($employee->gender == 'female') selected @endif>Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Birthday</label>
                    <input type="text" name="birthday" class="form-control birthday" autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="">Department</label>
                    <select class="form-control" name="department_id">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}" @if ($employee->department_id == $department->id) selected @endif>
                                {{ $department->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Date Of Join</label>
                    <input type="text" name="date_of_join" class="form-control date_of_join" autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="">Is Present?</label>
                    <select class="form-control" name="is_present">
                        <option value="1" @if ($employee->is_present == 1) selected @endif>Yes</option>
                        <option value="0" @if ($employee->is_present == 0) selected @endif>No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea name="address" class="form-control">{{ $employee->address }}</textarea>
                </div>
                <div class="md-form">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="d-flex justify-content-center mt-5 mb-3">
                    <div class="col-md-6 ">
                        <button type="submit" class="btn btn-theme btn-sm btn-block" style="color: white">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    {!! JsValidator::formRequest('App\Http\Requests\UpdateEmployee', '#edit-form') !!}

    <script>
        $(document).ready(function() {
            $('.birthday').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "showDropdowns": true,
                "maxDate": moment(),
                "locale": {
                    "format": "YYYY-MM-DD",
                },
            });
            $('.date_of_join').daterangepicker({
                "singleDatePicker": true,
                "autoApply": true,
                "showDropdowns": true,
                "maxDate": moment(),
                "locale": {
                    "format": "YYYY-MM-DD",
                },
            });
        });
    </script>
@endsection
