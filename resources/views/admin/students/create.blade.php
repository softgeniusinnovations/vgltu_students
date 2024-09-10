@extends('layouts.admin_app')

@section('content')
<div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #333;">Add New Student</h2>

        <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div style="margin-bottom: 15px;">
                <label for="name" style="font-weight: bold; color: #333;">Student Name:</label>
                <input type="text" name="name" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="degree" style="font-weight: bold; color: #333;">Degree:</label>
                <input type="text" name="degree" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="department" style="font-weight: bold; color: #333;">Department:</label>
                <input type="text" name="department" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="pass_year" style="font-weight: bold; color: #333;">Pass Year:</label>
                <input type="text" name="pass_year" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="photo" style="font-weight: bold; color: #333;">Upload Photo:</label>
                <input type="file" name="photo" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <button type="submit" style="width: 100%; background-color: #28a745; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer;">
                Submit
            </button>
        </form>
    </div>
</div>
@endsection
