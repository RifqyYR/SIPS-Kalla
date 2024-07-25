<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::paginate(10);
        return view('pages.service.service', compact('service'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search by name
        $results = Service::whereHas('client', function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })->with('client')->paginate(10);

        $results->appends(['query' => $query]);

        return response()->json([
            'data' => $results,
            'firstItem' => $results->firstItem(),
            'lastItem' => $results->lastItem(),
            'total' => $results->total(),
            'links' => $results->links('components.pagination')->render(),
        ]);
    }

    public function detail(string $uuid)
    {
        $service = Service::where('uuid', $uuid)->first();

        return view('pages.service.detail-service', compact('service'));
    }

    public function edit(string $uuid)
    {
        $service = Service::where('uuid', $uuid)->first();

        if ($service == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.service.edit-service', compact('service'));
    }

    public function update(Request $request, string $uuid)
    {
        // Validate Input
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'service_type' => 'required',
            'vehicle_km' => 'required|integer',
            'status' => 'required'
        ], [
            'date.required' => 'Field tanggal harus diisi',
            'time.required' => 'Field waktu harus diisi',
            'service_type.required' => 'Field tipe service harus diisi',
            'vehicle_km.required' => 'Field jarak tempuh (Km) harus diisi',
            'status.required' => 'Field status harus diisi',
        ]);

        try {
            $service = Service::where('uuid', $uuid)->first();

            $service->update([
                'date' => $request->date,
                'time' => $request->time,
                'service_type' => $request->service_type,
                'vehicle_km' => $request->vehicle_km,
                'status' => $request->status
            ]);

            return redirect()->route('service.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data');
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $service = Service::where('uuid', $uuid)->first();

            $service->delete();

            return redirect()->route('service.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
