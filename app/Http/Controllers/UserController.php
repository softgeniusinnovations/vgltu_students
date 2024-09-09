<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Get the currently authenticated user

        return view('user.edit', compact('user')); // Return a view with the user data
    }

    public function update(Request $request)
    {
        // Validate the request
        $request->validate([
        'email' => 'required|email|unique:users,email,' . Auth::id(), 
        'password' => 'nullable|min:8', 
        'mobile_number' => 'nullable',  
        'course_type' => 'nullable',    
        'department' => 'nullable',     
        'course_year' => 'nullable',    
        ]);

        // Get the currently authenticated user
        $user = Auth::user();

        // Update only the fields that the user is allowed to edit
        $user->email = $request->email;

        if ($request->password) {
            $user->password = bcrypt($request->password); // Only update password if provided
        }

        $user->mobile_number = $request->mobile_number;
        $user->course_type = $request->course_type;
        $user->department = $request->department;
        $user->course_year = $request->course_year;

        // Save the updated user information
        $user->save();

        return redirect()->route('home')->with('success', 'Your Data Successfully Updated!');
    }
    public function listByCategory($category, $value = null)
    {
        switch ($category) {
            case 'total':
                $users = User::all();
                break;
            case 'nationality':
                $users = User::where('country', $value)->get();
                break;
            case 'religion':
                $users = User::where('religion', $value)->get();
                break;
            case 'department':
                $users = User::where('department', $value)->get();
                break;
            case 'course':
                $users = User::where('course', $value)->get();
                break;
            default:
                $users = [];
        }

        return view('admin.user_details', compact('users'));
    }
    
    // User Delete
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Optional: Delete the user's photo from storage
        if ($user->photo && Storage::exists('public/' . $user->photo)) {
            Storage::delete('public/' . $user->photo);
        }

        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }
}
