@extends('layouts.app')
@section('title', 'Show Employee Details')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="col-md-6">
                <div class="mb-3">
                    <p class="mb-0"><i class="fas fa-user"></i> Name</p>
                    <p class="text-muted mb-0 mx-2">{{ $employee->name }}</p>
                </div>
                <div class="mb-3">
                    <p class="mb-0"><i class="fa-solid fa-envelope"></i> EMial</p>
                    <p class="text-muted mb-0 mx-2">{{ $employee->email }}</p>
                </div>
                <div class="mb-3">
                    <p class="mb-0"><i class="fas fa-phone"></i> Phone</p>
                    <p class="text-muted mb-0 mx-2">{{ $employee->phone }}</p>
                </div>
                <div class="mb-3">
                    <p class="mb-0"><i class="fas fa-address"></i> Address</p>
                    <p class="text-muted mb-0 mx-2">{{ $employee->address }}</p>
                </div>
                {{-- <div class="mb-3">
                    <p class="mb-0"><i class="fas fa-user"></i> Department</p>
                    <p class="text-muted mb-0 mx-2">{{ $employee->id }} {{ $employee->d }}</p>
                </div> --}}
                <div class="mb-3">
                    <p class="mb-0"><i class="fas fa-user"></i> Is Present</p>
                    <p class="text-muted mb-0 mx-2">{{ $employee->is_present }}</p>
                </div>
                <div class="mb-3">
                    <p class="mb-0"><i class="fas fa-user"></i> Date Of Birth</p>
                    <p class="text-muted mb-0 mx-2">{{ $employee->birthday }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
