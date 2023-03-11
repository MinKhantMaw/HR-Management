@extends('layouts.app')
@section('title', 'HR-Management')
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

            </div>
        </div>
    </div>
@endsection
