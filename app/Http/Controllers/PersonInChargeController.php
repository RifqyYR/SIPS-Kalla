<?php

namespace App\Http\Controllers;

use App\Models\PersonInCharge;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;

class PersonInChargeController extends Controller
{
    public function index()
    {
        $pics = PersonInCharge::paginate(10);

        return view('pages.person-in-charge.person_in_charge', compact('pics'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search by name
        $results = PersonInCharge::where('name', 'LIKE', "%{$query}%")->paginate(10);

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
        return view('pages.person-in-charge.create-person_in_charge');
    }

    public function store(Request $request)
    {
        // Validate Input
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'sector' => 'required'
        ], [
            'name.required' => 'Field nama harus diisi',
            'phone_number.required' => 'Field nomor telepon harus diisi',
            'sector.required' => 'Field bidang harus diisi',
        ]);

        try {
            PersonInCharge::create([
                'uuid' => Uuid::uuid4(),
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'sector' => $request->sector
            ]);

            return redirect()->route('pic.index')->with('success', 'Berhasil menambahkan data');
        } catch(\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function edit(string $uuid)
    {
        $pic = PersonInCharge::where('uuid', $uuid)->first();

        if ($pic == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.person-in-charge.edit-person_in_charge', compact('pic'));
    }

    public function update(Request $request, string $uuid)
    {
        // Validate Input
        $request->validate([
            'name' => 'required',
            'phone_number' => 'required',
            'sector' => 'required'
        ], [
            'name.required' => 'Field nama harus diisi',
            'phone_number.required' => 'Field nomor telepon harus diisi',
            'sector.required' => 'Field bidang harus diisi',
        ]);

        try {
            $pic = PersonInCharge::where('uuid', $uuid)->first();

            $pic->update([
                'name' => $request->name,
                'phone_number' => $request->phone_number,
                'sector' => $request->sector,
            ]);

            return redirect()->route('pic.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data');
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $pic = PersonInCharge::where('uuid', $uuid)->first();

            $pic->delete();

            return redirect()->route('pic.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }    
}
