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
    public function search(Request $request)
    {
        $criteria = $request->input('search_criteria');
        $searchTerm = $request->input($criteria);

        $query = User::query();

        if ($criteria && $searchTerm) {
            $query->where($criteria, 'LIKE', '%' . $searchTerm . '%');
        }

        $users = $query->get();

        return view('admin.users.search_results', compact('users'));
    }
}
