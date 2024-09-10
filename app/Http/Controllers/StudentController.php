<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index', compact('students'));
    }

    public function create()
    {
        return view('admin.students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'degree' => 'required',
            'department' => 'required',
            'pass_year' => 'required|digits:4',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('students', 'public');
        }

        // Store student details
        Student::create([
            'name' => $request->name,
            'photo_path' => $photoPath,
            'degree' => $request->degree,
            'department' => $request->department,
            'pass_year' => $request->pass_year,
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function edit(Student $student)
    {
        return view('admin.students.edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'degree' => 'required',
            'department' => 'required',
            'pass_year' => 'required|digits:4',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete the old photo
            if ($student->photo_path) {
                Storage::disk('public')->delete($student->photo_path);
            }
            $photoPath = $request->file('photo')->store('students', 'public');
            $student->photo_path = $photoPath;
        }

        // Update student details
        $student->update([
            'name' => $request->name,
            'degree' => $request->degree,
            'department' => $request->department,
            'pass_year' => $request->pass_year,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        if ($student->photo_path) {
            Storage::disk('public')->delete($student->photo_path);
        }

        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
