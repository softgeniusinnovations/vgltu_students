@extends('layouts.admin_app')

@section('content')
<style>
    .user-details-card {
        display: flex;
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        background-color: #fff;
        flex-wrap: wrap; /* This allows wrapping for smaller screens */
    }

    .user-photo {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-right: 20px;
    }

    .user-photo img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        margin-bottom: 20px;
    }

    .user-info {
        flex: 2;
    }

    .user-info h5 {
        font-size: 1.5rem;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .user-info p {
        font-size: 1.1rem;
        margin-bottom: 5px;
    }

    .user-actions {
        margin-top: 20px;
        display: flex;
        justify-content: center;
    }

    .btn-print, .btn-pdf {
        margin: 0 10px;
        padding: 10px 20px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }

    .btn-print:hover, .btn-pdf:hover {
        background-color: #0056b3;
    }

    @media print {
        .btn-print, .btn-pdf {
            display: none;
        }
    }

    /* Mobile responsiveness */
    @media (max-width: 768px) {
        .user-details-card {
            flex-direction: column; /* Stack the photo and details vertically */
            align-items: center; /* Center items */
            text-align: center;
        }

        .user-photo {
            margin-right: 0; /* Remove the right margin */
            margin-bottom: 20px; /* Add bottom margin */
        }

        .user-info {
            text-align: left; /* Center align the text on mobile */
        }

        .user-photo img {
            width: 100px; /* Reduce image size on mobile */
            height: 100px;
        }

        .user-info p {
            font-size: 1rem; /* Adjust font size on smaller screens */
        }

        .btn-print, .btn-pdf {
            width: 100%; /* Make buttons full width on mobile */
            margin-bottom: 10px;
        }
    }
</style>

<div class="container">
    <div class="user-details-card">
        <!-- Left Side: Photo, Mobile Number, and Name -->
        <div class="user-photo">
            @if($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" alt="User Photo" class="img-fluid rounded">
            @else
                <img src="{{ asset('storage/default.png') }}" alt="Default Photo" class="img-fluid rounded">
            @endif
            <h5>Mobile: {{ $user->mobile_number }}</h5>
            <h5>Name: {{ $user->full_name }}</h5>
        </div>
        
        <!-- Right Side: All Other Details -->
        <div class="user-info">
            <p><strong>Room Number:</strong> {{ $user->room_number }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Country:</strong> {{ $user->country }}</p>
            <p><strong>Address:</strong> {{ $user->address }}</p>
            <p><strong>Gender:</strong> {{ $user->gender }}</p>
            <p><strong>Religion:</strong> {{ $user->religion }}</p>
            <p><strong>Date of Birth:</strong> {{ $user->date_of_birth }}</p>
            <p><strong>Course Type:</strong> {{ $user->course_type }}</p>
            <p><strong>Department:</strong> {{ $user->department }}</p>
            <p><strong>Course Year:</strong> {{ $user->course_year }}</p>
        </div>
    </div>
    
    <!-- Actions: Print and Download PDF -->
    <div class="user-actions">
        <button onclick="window.print()" class="btn-print">Print</button>
        <a href="{{ route('admin.users.pdf', $user->id) }}" class="btn-pdf">Download PDF</a>
    </div>
</div>
@endsection
