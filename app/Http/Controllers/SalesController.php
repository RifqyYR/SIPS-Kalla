<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class SalesController extends Controller
{
    public function index()
    {
        $sales = Sales::paginate(10);

        return view('pages.sales.sales', compact('sales'));
    }

    private function ensureDirectoryHasPermissions($directory, $permissions = 0755)
    {
        if (is_dir($directory)) {
            $currentPermissions = substr(sprintf('%o', fileperms($directory)), -4);
            if ($currentPermissions !== sprintf('%o', $permissions)) {
                chmod($directory, $permissions);
            }
        } else {
            mkdir($directory, $permissions, true);
        }
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search by name
        $results = Sales::where('name', 'LIKE', "%{$query}%")->paginate(10);

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
        return view('pages.sales.create-sales');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'phone_number' => 'required',
            'img' => 'required',
        ], [
            'name.required' => 'Field nama harus diisi',
            'phone_number.required' => 'Field nomor telepon harus diisi',
            'description.required' => 'Field deksripsi harus diisi',
            'img.required' => 'Field gambar harus diisi',
        ]);

        try {
            $salesDirectory = storage_path('app/public/sales');

            $this->ensureDirectoryHasPermissions($salesDirectory);
            
            $filename = hash('sha256', time() . '-' . $request->file('img')->getClientOriginalName()) . '.' . $request->file('img')->extension();
            
            Sales::create([
                'uuid' => Uuid::uuid4(),
                'name' => $request->name,
                'description' => $request->description,
                'phone_number' => $request->phone_number,
                'img_url' => $filename,
                'leads' => 0,
            ]);

            $request->file('img')->storeAs('public/sales/', $filename);

            return redirect()->route('sales.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data' . $e->getMessage());
        }
    }

    public function edit(string $uuid)
    {
        $sales = Sales::where('uuid', $uuid)->first();

        if ($sales == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.sales.edit-sales', compact('sales'));
    }

    public function update(Request $request, string $uuid)
    {
        try {
            $sales = Sales::where('uuid', $uuid)->first();

            $salesDirectory = storage_path('app/public/sales');

            $this->ensureDirectoryHasPermissions($salesDirectory);

            if ($request->file() == []) {
                $sales->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'phone_number' => $request->phone_number,
                ]);

                return redirect()->route('sales.index')->with('success', 'Berhasil mengedit data');
            }
            
            $filename = hash('sha256', time() . '-' . $request->file('img')->getClientOriginalName()) . '.' . $request->file('img')->extension();

            $sales->update([
                'name' => $request->name,
                'description' => $request->description,
                'phone_number' => $request->phone_number,
                'img_url' => $filename,
            ]);

            if (Storage::exists('/public/sales/' . $sales->img_url)) {
                Storage::delete('/public/sales/' . $sales->img_url);
            }
            $request->file('img')->storeAs('public/sales/', $filename);

            return redirect()->route('sales.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data');
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $sales = Sales::where('uuid', $uuid)->first();

            $sales->delete();

            return redirect()->route('sales.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    public function detail(string $uuid)
    {
        $sales = Sales::where('uuid', $uuid)->first();

        return view('pages.sales.detail-sales', compact('sales'));
    }
}
