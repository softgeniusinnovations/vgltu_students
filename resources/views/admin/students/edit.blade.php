@extends('layouts.admin_app')

@section('content')
<div style="font-family: Arial, sans-serif; background-color: #f9f9f9; padding: 20px;">
    <div style="max-width: 600px; margin: auto; background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
        <h2 style="text-align: center; color: #333;">Edit Student</h2>

        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div style="margin-bottom: 15px;">
                <label for="name" style="font-weight: bold; color: #333;">Student Name:</label>
                <input type="text" name="name" value="{{ $student->name }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="degree" style="font-weight: bold; color: #333;">Degree:</label>
                <input type="text" name="degree" value="{{ $student->degree }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="department" style="font-weight: bold; color: #333;">Department:</label>
                <input type="text" name="department" value="{{ $student->department }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 15px;">
                <label for="pass_year" style="font-weight: bold; color: #333;">Pass Year:</label>
                <input type="text" name="pass_year" value="{{ $student->pass_year }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;" required>
            </div>
            <div style="margin-bottom: 20px;">
                <label for="photo" style="font-weight: bold; color: #333;">Update Photo:</label>
                <input type="file" name="photo" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                <img src="{{ asset('storage/'.$student->photo_path) }}" style="margin-top: 10px; width: 100px; height: auto; border-radius: 5px;">
            </div>
            <button type="submit" style="width: 100%; background-color: #007bff; color: white; padding: 12px; border: none; border-radius: 5px; cursor: pointer;">
                Update
            </button>
        </form>
    </div>
</div>
@endsection
