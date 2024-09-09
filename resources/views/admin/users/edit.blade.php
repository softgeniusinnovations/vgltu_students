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

            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" id="country" value="{{ $user->country }}" required>
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

            <div class="form-group">
                <label for="religion">Religion:</label>
                <input type="text" name="religion" id="religion" value="{{ $user->religion }}" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Date of Birth:</label>
                <input type="date" name="date_of_birth" id="date_of_birth" value="{{ $user->date_of_birth }}" required>
            </div>

            <div class="form-group">
                <label for="course_type">Course Type:</label>
                <input type="text" name="course_type" id="course_type" value="{{ $user->course_type }}" required>
            </div>

            <div class="form-group">
                <label for="department">Department:</label>
                <input type="text" name="department" id="department" value="{{ $user->department }}" required>
            </div>

            <div class="form-group">
                <label for="course_year">Course Year:</label>
                <input type="text" name="course_year" id="course_year" value="{{ $user->course_year }}" required>
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
