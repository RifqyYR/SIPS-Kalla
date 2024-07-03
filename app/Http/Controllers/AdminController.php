<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

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

    public function create()
    {
        return view('pages.admin-management.create-admin_management');
    }

    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email'
        ], [
            'name.required' => 'Input nama harus diisi',
            'email.required' => 'Input email harus diisi',
            'email.email' => 'Masukkan email yang valid',
            'email.unique' => 'Email ini sudah digunakan'
        ]);

        try {
            User::create([
                'uuid' => Uuid::uuid4(),
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(env('DEFAULT_PASSWORD'))
            ]);

            return redirect()->route('admin-management.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }
}
