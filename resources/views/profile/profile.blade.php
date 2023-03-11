@extends('layouts.app')
@section('title', 'Profiel')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="text-center d-flex justify-content-start">
                        <img src="{{ $authUser->profile_image_path() }}" alt="" class="profile-image">
                        <div class="py-3 px-3">
                            <h4>{{ $authUser->name }}</h4>
                            <p class="text-muted mb-2"><span class="text-muted">{{ $authUser->employee_id }}</span> | <span
                                    class="text-theme">{{ $authUser->phone }}</span></p>
                            <p class="text-muted mb-2"><span
                                    class="badge badge-pill badge-light border">{{ $authUser->department ? $authUser->department->title : '-' }}</span>
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 dash-border">
                    <p class="mb-1"><strong>Phone</strong> : <span class="text-muted">{{ $authUser->phone }}</span>
                    </p>
                    <p class="mb-1"><strong>Email</strong> : <span class="text-muted">{{ $authUser->email }}</span>
                    </p>
                    <p class="mb-1"><strong>NRC Number</strong> : <span
                            class="text-muted">{{ $authUser->nrc_number }}</span>
                    </p>
                    <p class="mb-1"><strong>Gender</strong> : <span
                            class="text-muted">{{ ucfirst($authUser->gender) }}</span>
                    </p>
                    <p class="mb-1"><strong>Birthday</strong> : <span class="text-muted">{{ $authUser->birthday }}</span>
                    </p>
                    <p class="mb-1"><strong>Address</strong> : <span class="text-muted">{{ $authUser->address }}</span>
                    </p>

                    <p class="mb-1"><strong>Date of Join</strong> : <span
                            class="text-muted">{{ $authUser->date_of_join }}</span></p>
                    <p class="mb-1"><strong>Is Present?</strong> :
                        @if ($authUser->is_present == 1)
                            <span class="badge badge-pill badge-success">Present</span>
                        @else
                            <span class="badge badge-pill badge-danger">Leave</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
