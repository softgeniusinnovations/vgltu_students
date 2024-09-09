@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Profile</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('user.update') }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}">
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password (Leave blank to keep current password)</label>
            <input type="password" name="password" id="password" class="form-control">
            @error('password')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="mobile_number">Mobile Number</label>
            <input type="text" name="mobile_number" id="mobile_number" class="form-control" value="{{ old('mobile_number', $user->mobile_number) }}" >
            @error('mobile_number')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="course_type">Course Type</label>
            <select name="course_type" id="course_type" class="form-control" >
                <option value="Language" {{ old('course_type', $user->course_type) == 'Language' ? 'selected' : '' }}>Language</option>
                <option value="BSC" {{ old('course_type', $user->course_type) == 'BSC' ? 'selected' : '' }}>BSC</option>
                <option value="MSC" {{ old('course_type', $user->course_type) == 'MSC' ? 'selected' : '' }}>MSC</option>
                <option value="PHD" {{ old('course_type', $user->course_type) == 'PHD' ? 'selected' : '' }}>PHD</option>
            </select>
            @error('course_type')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="department">Department</label>
            <select name="department" id="department" class="form-control" >
                <option value="Prepetory Language Course" {{ old('department', $user->department) == 'Prepetory Language Course' ? 'selected' : '' }}>Prepetory Language Course</option>
                <option value="Automobile" {{ old('department', $user->department) == 'Automobile' ? 'selected' : '' }}>Automobile</option>
                <option value="Forestry" {{ old('department', $user->department) == 'Forestry' ? 'selected' : '' }}>Forestry</option>
                <option value="Mechanical" {{ old('department', $user->department) == 'Mechanical' ? 'selected' : '' }}>Mechanical</option>
                <option value="Computer Science and Technology" {{ old('department', $user->department) == 'Computer Science and Technology' ? 'selected' : '' }}>Computer Science and Technology</option>
                <option value="Economics" {{ old('department', $user->department) == 'Economics' ? 'selected' : '' }}>Economics</option>
            </select>
            @error('department')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="course_year">Course Year</label>
            <select name="course_year" id="course_year" class="form-control" >
                <option value="1st Year" {{ old('course_year', $user->course_year) == '1st Year' ? 'selected' : '' }}>1st Year</option>
                <option value="2nd Year" {{ old('course_year', $user->course_year) == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                <option value="3rd Year" {{ old('course_year', $user->course_year) == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                <option value="Final Year" {{ old('course_year', $user->course_year) == 'Final Year' ? 'selected' : '' }}>Final Year</option>
            </select>
            @error('course_year')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Profile</button>
    </form>
</div>
@endsection

@section('scripts')
<!-- Include jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function() {
        @if(session('success'))
            // Show the modal if the success message is present
            $('#successModal').modal('show');
        @endif
    });
</script>
@endsection
