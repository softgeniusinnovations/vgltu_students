@extends('layouts.admin_app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload New Photo</title>

    <!-- TinyMCE Script -->
    <script src="https://cdn.tiny.cloud/1/wj0tnfge5dwt2pfaan81gg68pfs8bqtzmjrn9k5kxmwaqb0e/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
        // Initialize TinyMCE on the 'description' textarea
        tinymce.init({
            selector: 'textarea#description',  // Apply TinyMCE to this selector
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | bold italic backcolor | \
                      alignleft aligncenter alignright alignjustify | \
                      bullist numlist outdent indent | removeformat | help',
        });
    </script>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">

    <div style="max-width: 600px; margin: auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #333;">Upload New Photos</h2>
        
        <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Title Input -->
            <div style="margin-bottom: 15px;">
                <label for="title" style="display: block; font-weight: bold; margin-bottom: 5px;">Title:</label>
                <input type="text" name="title" required 
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <!-- Short Description Input -->
            <div style="margin-bottom: 15px;">
                <label for="short_description" style="display: block; font-weight: bold; margin-bottom: 5px;">Short Description:</label>
                <input type="text" name="short_description" required
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <!-- Description Input with TinyMCE Editor -->
            <div style="margin-bottom: 15px;">
                <label for="description" style="display: block; font-weight: bold; margin-bottom: 5px;">Description:</label>
                <textarea id="description" name="description" required 
                          style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;"></textarea>
            </div>

            <!-- Photo Upload Input -->
            <div style="margin-bottom: 15px;">
                <label for="photos" style="display: block; font-weight: bold; margin-bottom: 5px;">Upload Photos:</label>
                <input type="file" name="photos[]" multiple required
                       style="width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px;">
            </div>

            <!-- Submit Button -->
            <div style="text-align: center;">
                <button type="submit" 
                        style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                    Submit
                </button>
            </div>
        </form>
    </div>

</body>
</html>

@endsection