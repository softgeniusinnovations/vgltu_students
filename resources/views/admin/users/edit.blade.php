@extends('layouts.admin_app')

@section('content')
<style>
    .edit-user-form {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .edit-user-form h2 {
        margin-bottom: 20px;
        font-size: 1.5rem;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        font-weight: bold;
    }
    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 10px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-group img {
        margin-top: 10px;
        max-width: 150px;
        border-radius: 8px;
    }
    .btn-submit {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-submit:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <div class="edit-user-form">
        <h2>Edit User Information</h2>

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="full_name">Full Name:</label>
                <input type="text" name="full_name" id="full_name" value="{{ $user->full_name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" required>
            </div>

            <div class="form-group">
                <label for="mobile_number">Mobile Number:</label>
                <input type="text" name="mobile_number" id="mobile_number" value="{{ $user->mobile_number }}" required>
            </div>

            <div class="form-group">
                <label for="room_number">Room Number:</label>
                <input type="text" name="room_number" id="room_number" value="{{ $user->room_number }}" required>
            </div>

            <!-- Country select dropdown -->
            <div class="form-group">
                <label for="country">Country:</label>
                <select class="form-control" id="country" name="country" required>
                    <option value="Bangladesh" {{ $user->country == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                    <option value="India" {{ $user->country == 'India' ? 'selected' : '' }}>India</option>
                    <option value="Nepal" {{ $user->country == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                </select>
            </div>

            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" required>{{ $user->address }}</textarea>
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select name="gender" id="gender" required>
                    <option value="Male" {{ $user->gender == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ $user->gender == 'Female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <!-- Religion select dropdown -->
            <div class="form-group">
                <label for="religion">Religion:</label>
                <select class="form-control" id="religion" name="religion" required>
                    <option value="Muslim" {{ $user->religion == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                    <option value="Hindu" {{ $user->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="Boddho" {{ $user->religion == 'Boddho' ? 'selected' : '' }}>Boddho</option>
                    <option value="Cristan" {{ $user->religion == 'Cristan' ? 'selected' : '' }}>Cristan</option>
                </select>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}" required>
            </div>

            <!-- Course Type select dropdown -->
            <div class="form-group">
                <label for="course_type">Course Type:</label>
                <select class="form-control" id="course_type" name="course_type" required>
                    <option value="Language" {{ $user->course_type == 'Language' ? 'selected' : '' }}>Language</option>
                    <option value="BSC" {{ $user->course_type == 'BSC' ? 'selected' : '' }}>BSC</option>
                    <option value="MSC" {{ $user->course_type == 'MSC' ? 'selected' : '' }}>MSC</option>
                    <option value="PHD" {{ $user->course_type == 'PHD' ? 'selected' : '' }}>PHD</option>
                </select>
            </div>

            <!-- Department select dropdown -->
            <div class="form-group">
                <label for="department">Department:</label>
                <select class="form-control" id="department" name="department" required>
                    <option value="Prepetory Language Course" {{ $user->department == 'Prepetory Language Course' ? 'selected' : '' }}>Prepetory Language Course</option>
                    <option value="Automobile" {{ $user->department == 'Automobile' ? 'selected' : '' }}>Automobile</option>
                    <option value="Forestry" {{ $user->department == 'Forestry' ? 'selected' : '' }}>Forestry</option>
                    <option value="Mechanical" {{ $user->department == 'Mechanical' ? 'selected' : '' }}>Mechanical</option>
                    <option value="Computer Science and Technology" {{ $user->department == 'Computer Science and Technology' ? 'selected' : '' }}>Computer Science and Technology</option>
                    <option value="Economics" {{ $user->department == 'Economics' ? 'selected' : '' }}>Economics</option>
                </select>
            </div>

            <!-- Course Year select dropdown -->
            <div class="form-group">
                <label for="course_year">Course Year:</label>
                <select class="form-control" id="course_year" name="course_year" required>
                    <option value="1st Year" {{ $user->course_year == '1st Year' ? 'selected' : '' }}>1st Year</option>
                    <option value="2nd Year" {{ $user->course_year == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                    <option value="3rd Year" {{ $user->course_year == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                    <option value="Final Year" {{ $user->course_year == 'Final Year' ? 'selected' : '' }}>Final Year</option>
                </select>
            </div>

            <div class="form-group">
                <label for="photo">User Photo:</label>
                <input type="file" name="photo" id="photo">
                @if($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo">
                @else
                    <p>No photo available</p>
                @endif
            </div>

            <button type="submit" class="btn-submit">Update User</button>
        </form>
    </div>
</div>

@endsection
