@extends('layouts.app')

@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <!-- Dashboard Layout -->
<div class="container dashboard">
    <div class="row">
        <!-- Left Side: Profile Photo and Basic Info -->
        <div class="col-md-4 profile-left">
            <div class="profile-photo">
                <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="User Photo" class="img-fluid rounded">
            </div>
            <div class="profile-info">
                <p><strong>Room Number:</strong> {{ Auth::user()->room_number }}</p>
                <p><strong>Full Name:</strong> {{ Auth::user()->full_name }}</p>
                <p><strong>Mobile Number:</strong> {{ Auth::user()->mobile_number }}</p>
            </div>
        </div>

        <!-- Right Side: Detailed Info -->
        <div class="col-md-8 profile-right">
            <div class="profile-info">
                <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                <p><strong>Country:</strong> {{ Auth::user()->country }}</p>
                <p><strong>Address:</strong> {{ Auth::user()->address }}</p>
                <p><strong>Religion:</strong> {{ Auth::user()->religion }}</p>
                <p><strong>Date of Birth:</strong> {{ Auth::user()->date_of_birth }}</p>
                <p><strong>Gender:</strong> {{ Auth::user()->gender }}</p>
                <p><strong>Course Type:</strong> {{ Auth::user()->course_type }}</p>
                <p><strong>Department:</strong> {{ Auth::user()->department }}</p>
                <p><strong>Course Year:</strong> {{ Auth::user()->course_year }}</p>
            </div>
        </div>
    </div>
</div>



                </div>
            </div>
        </div>
    </div>
</div>
<!-- CSS Styling -->
<style>
    .dashboard {
        padding-top: 20px;
    }
    .profile-left {
        text-align: center;
        border-right: 1px solid #ddd;
    }
    .profile-photo img {
        max-width: 150px;
        border-radius: 50%;
        margin-bottom: 15px;
    }
    .profile-info {
        margin-top: 20px;
    }
    .profile-info p {
        font-size: 1rem;
        line-height: 1.5;
    }
    .profile-right {
        padding-left: 20px;
    }
</style>
@endsection
