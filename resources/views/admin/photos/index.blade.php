@extends('layouts.admin_app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photo Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .upload-btn {
            text-align: right;
            margin-bottom: 20px;
        }

        .upload-btn a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        .photo-row {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 10px 0;
        }

        .photo-row img {
            border-radius: 5px;
        }

        .photo-info {
            padding-left: 20px;
        }

        .action-links {
            display: flex;
            gap: 10px;
        }

        .action-links a, .action-links button {
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
            color: white;
        }

        .edit-btn {
            background-color: #007bff;
        }

        .delete-btn {
            background-color: #dc3545;
            border: none;
            cursor: pointer;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .photo-row {
                flex-direction: column;
                align-items: flex-start;
            }

            .photo-info {
                padding-left: 0;
                padding-top: 10px;
            }

            img {
                width: 100%;
            }

            th, td {
                font-size: 14px;
                padding: 8px;
            }
        }

        @media (max-width: 480px) {
            th, td {
                font-size: 12px;
                padding: 6px;
            }

            .upload-btn {
                text-align: center;
            }

            .upload-btn a {
                width: 100%;
                display: block;
            }

            .action-links {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>

    <div class="container">
        
        <!-- Upload New Photo Button -->
        <div class="upload-btn">
            <a href="{{ route('photos.create') }}">
                Upload New Photo
            </a>
        </div>

        <!-- Photos Table -->
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Title & sub Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photos as $photo)
                    <tr>
                        <td>
                            <div class="photo-row">
                                <img src="{{ asset('storage/'.$photo->image_path) }}" width="100" />
                            </div>
                        </td>
                        <td>
                            <div class="photo-info">
                                <strong>{{ $photo->title }}</strong><br>
                                <span>{{ $photo->short_description }}</span><br>
                                
                            </div>
                        </td>
                        <td>
                            <div class="action-links">
                                <a href="{{ route('photos.edit', $photo->id) }}" class="edit-btn">Edit</a>
                                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-btn">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>

</body>
</html>

@endsection
