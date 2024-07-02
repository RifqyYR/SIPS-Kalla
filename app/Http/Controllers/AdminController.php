<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::paginate(10);

        return view('pages.admin-management.admin_management', compact('admins'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search by name and email
        $results = User::where('name', 'LIKE', "%{$query}%")
                        ->orWhere('email', 'LIKE', "%{$query}%")
                        ->paginate(10);

        $results->appends(['query' => $query]);

        return response()->json([
            'data' => $results,
            'firstItem' => $results->firstItem(),
            'lastItem' => $results->lastItem(),
            'total' => $results->total(),
            'links' => $results->links('components.pagination')->render(),
        ]);
    }
}
