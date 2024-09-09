<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category');
        $value = $request->input('value');

        // Filter users based on the selected category and value
        $users = User::where($category, $value)->get();

        return view('admin.users.index', compact('users', 'category', 'value'));
    }

    // View user details
    public function view($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.dashboard')->with('error', 'User not found');
        }

        return view('admin.users.view', compact('user'));
    }
    public function downloadPDF($id)
    {
        $user = User::find($id);
        $pdf = PDF::loadView('admin.users.pdf', compact('user'));
        return $pdf->download('user_details.pdf');
    }

    //User Edit
    public function edit($id)
    {
    $user = User::findOrFail($id);
    return view('admin.users.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'required',
            'room_number' => 'required',
            'country' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'date_of_birth' => 'required|date',
            'course_type' => 'required',
            'department' => 'required',
            'course_year' => 'required',
        ]);
    
        $user = User::findOrFail($id);
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->mobile_number = $request->mobile_number;
        $user->room_number = $request->room_number;
        $user->country = $request->country;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->religion = $request->religion;
        $user->date_of_birth = $request->date_of_birth;
        $user->course_type = $request->course_type;
        $user->department = $request->department;
        $user->course_year = $request->course_year;
    
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $user->photo = $photoPath;
        }
    
        $user->save();
    
        return redirect()->route('admin.users.view', $user->id)->with('success', 'User updated successfully');
    }

    // Delete user
    public function delete($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('admin.dashboard')->with('error', 'User not found');
        }

        // Delete user
        $user->delete();

        return redirect()->route('admin.dashboard')->with('success', 'User deleted successfully');
    }
    public function show($id)
{


}
}
