@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="room_number">Room Number</label>
                            <input type="text" class="form-control" id="room_number" name="room_number" value="{{ old('room_number') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="full_name">Full Name</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <div class="form-group">
                            <label for="mobile_number">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="country">Country</label>
                            <select class="form-control" id="country" name="country" required>
                                <option value="Bangladesh" {{ old('country') == 'Bangladesh' ? 'selected' : '' }}>Bangladesh</option>
                                <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                                <option value="Nepal" {{ old('country') == 'Nepal' ? 'selected' : '' }}>Nepal</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="address">Address (as per Passport)</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="religion">Religion</label>
                            <select class="form-control" id="religion" name="religion" required>
                                <option value="Muslim" {{ old('religion') == 'Muslim' ? 'selected' : '' }}>Muslim</option>
                                <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="Boddho" {{ old('religion') == 'Boddho' ? 'selected' : '' }}>Boddho</option>
                                <option value="Cristan" {{ old('religion') == 'Cristan' ? 'selected' : '' }}>Cristan</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select class="form-control" id="gender" name="gender" required>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="date_of_birth">Date of Birth</label>
                            <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="course_type">Course Type</label>
                            <select class="form-control" id="course_type" name="course_type" required>
                                <option value="Language" {{ old('course_type') == 'Language' ? 'selected' : '' }}>Language</option>
                                <option value="BSC" {{ old('course_type') == 'BSC' ? 'selected' : '' }}>BSC</option>
                                <option value="MSC" {{ old('course_type') == 'MSC' ? 'selected' : '' }}>MSC</option>
                                <option value="PHD" {{ old('course_type') == 'PHD' ? 'selected' : '' }}>PHD</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="department">Department</label>
                            <select class="form-control" id="department" name="department" required>
                                <option value="Prepetory Language Course" {{ old('department') == 'Prepetory Language Course' ? 'selected' : '' }}>Prepetory Language Course</option>
                                <option value="Automobile" {{ old('department') == 'Automobile' ? 'selected' : '' }}>Automobile</option>
                                <option value="Forestry" {{ old('department') == 'Forestry' ? 'selected' : '' }}>Forestry</option>
                                <option value="Mechanical" {{ old('department') == 'Mechanical' ? 'selected' : '' }}>Mechanical</option>
                                <option value="Computer Science and Technology" {{ old('department') == 'Computer Science and Technology' ? 'selected' : '' }}>Computer Science and Technology</option>
                                <option value="Economics" {{ old('department') == 'Economics' ? 'selected' : '' }}>Economics</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_year">Course Year</label>
                            <select class="form-control" id="course_year" name="course_year" required>
                                <option value="1st Year" {{ old('course_year') == '1st Year' ? 'selected' : '' }}>1st Year</option>
                                <option value="2nd Year" {{ old('course_year') == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                <option value="3rd Year" {{ old('course_year') == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                <option value="Final Year" {{ old('course_year') == 'Final Year' ? 'selected' : '' }}>Final Year</option>
                            </select>
                        </div>
                        <!-- Photo Upload Field -->
                        <div class="form-group">
                            <label for="photo">Upload Photo</label>
                            <input type="file" class="form-control" id="photo" name="photo" required>
                        </div>


                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function showErrorModal(message) {
        // Set the error message
        document.getElementById('errorMessage').innerText = message;
        // Show the error modal
        var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
        errorModal.show();
    }

    // Example usage
    // You can call this function whenever there's an error to show the popup
    // showErrorModal('This is a custom error message');
</script>
@endsection
