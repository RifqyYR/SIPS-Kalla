<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function index()
    {
        $clients = Client::paginate(10);

        return view('pages.customer.customer', compact('clients'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search by name
        $results = Client::where('name', 'LIKE', "%{$query}%")->paginate(10);

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
        return view('pages.customer.create-customer');
    }

    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'phone_number' => 'required|unique:clients,phone_number',
            'address' => 'required'
        ], [
            'name.required' => 'Input nama harus diisi',
            'email.required' => 'Input email harus diisi',
            'email.email' => 'Masukkan email yang valid',
            'email.unique' => 'Email ini sudah digunakan',
            'phone_number.required' => 'Field nomor telepon harus diisi',
            'phone_number.unique' => 'Nomor telepon ini sudah digunakan',
            'address.required' => 'Field alamat harus diisi',
        ]);

        try {
            Client::create([
                'uuid' => Uuid::uuid4(),
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make(env('DEFAULT_PASSWORD')),
                'phone_number' => $request->phone_number,
                'address' => $request->address
            ]);

            return redirect()->route('customer.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function edit(string $uuid)
    {
        $client = Client::where('uuid', $uuid)->first();

        if ($client == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.customer.edit-customer', compact('client'));
    }

    public function update(Request $request, string $uuid)
    {
        // Validate Input
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'address' => 'required'
        ], [
            'name.required' => 'Input nama harus diisi',
            'email.required' => 'Input email harus diisi',
            'email.email' => 'Masukkan email yang valid',
            'phone_number.required' => 'Field nomor telepon harus diisi',
            'address.required' => 'Field alamat harus diisi',
        ]);

        try {
            $client = Client::where('uuid', $uuid)->first();

            $client->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'address' => $request->address
            ]);

            return redirect()->route('customer.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data');
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $client = Client::where('uuid', $uuid)->first();

            $client->delete();

            return redirect()->route('customer.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
