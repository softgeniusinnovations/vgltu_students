<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{

    public function showSearchForm()
    {
        return view('admin.users.search');
    }

    // Perform the search based on selected criteria
    public function search(Request $request)
    {
        dd($request->all());
        $criteria = $request->input('search_criteria'); // Get selected criteria
        $searchTerm = $request->input($criteria); // Get the search term for the selected criteria

        $query = User::query();

        // Perform search only if criteria and search term are provided
        if ($criteria && $searchTerm) {
            $query->where($criteria, 'LIKE', '%' . $searchTerm . '%');
        }

        $users = $query->get(); // Fetch all matching users

        return view('admin.users.search_result', compact('users'));
    }
}
