<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        /* General Styling for A4 PDF */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            padding: 20px;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header h2 {
            margin: 0;
        }
        .user-photo {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .user-info {
            margin-top: 20px;
        }
        .user-info p {
            font-size: 1rem;
            margin-bottom: 5px;
        }
        .user-details {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .user-details .details-left {
            flex: 1;
        }
        .user-details .details-right {
            flex: 1;
            text-align: right;
        }
        /* For A4 page */
        @page {
            size: A4;
            margin: 20mm;
        }
    </style>
</head>
<body>

    <!-- Header with Room Number -->
    <div class="header">
        <h2>Room Number: {{ $user->room_number }}</h2>
        @if($user->photo)
            <img src="{{ public_path('storage/' . $user->photo) }}" alt="User Photo" class="user-photo">
        @else
            <img src="{{ public_path('storage/default.png') }}" alt="Default Photo" class="user-photo">
        @endif
    </div>

    <!-- User Information -->
    <div class="user-info">
        <h3>Name: {{ $user->full_name }}</h3>
        <p><strong>Mobile Number:</strong> {{ $user->mobile_number }}</p>
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
</body>
</html>
