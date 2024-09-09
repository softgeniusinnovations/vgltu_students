<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index(Request $request){
        // Fetch data from the database using the User model
        $totalStudents = User::count();
        $totalBangladeshiStudents = User::where('country', 'Bangladesh')->count();
        $totalIndianStudents = User::where('country', 'India')->count();
        $totalNepaliStudents = User::where('country', 'Nepal')->count();

        // Students by religion
        $muslimStudents = User::where('religion', 'Muslim')->count();
        $hinduStudents = User::where('religion', 'Hindu')->count();
        $boddhoStudents = User::where('religion', 'Boddho')->count();
        $cristanStudents = User::where('religion', 'Cristan')->count();

        // Students by department
        $languageStudents = User::where('course_type', 'Language')->count();
        $automobileStudents = User::where('department', 'Automobile')->count();
        $forestryStudents = User::where('department', 'Forestry')->count();
        $mechanicalStudents = User::where('department', 'Mechanical')->count();
        $cstStudents = User::where('department', 'Computer Science and Technology')->count();
        $economicsStudents = User::where('department', 'Economics')->count();

        // Students fined by course
        $languageStudents = User::where('course_type', 'Language')->count();
        $bscStudents = User::where('course_type', 'BSC')->count();
        $mscStudents = User::where('course_type', 'MSC')->count();
        $phdStudents = User::where('course_type', 'PHD')->count();

        // Return the view with the data
        return view('admin.dashboard', compact(
            'totalStudents', 'totalBangladeshiStudents', 'totalIndianStudents', 'totalNepaliStudents',
            'muslimStudents', 'hinduStudents', 'boddhoStudents', 'cristanStudents',
            'languageStudents', 'automobileStudents', 'forestryStudents', 'mechanicalStudents', 'cstStudents', 'economicsStudents',
            'languageStudents', 'bscStudents', 'mscStudents', 'phdStudents'
        ));
    }
}
