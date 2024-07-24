<?php

namespace App\Http\Controllers;

use App\Models\CatalogCars;
use App\Models\Image;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class CatalogCarController extends Controller
{
    public function index()
    {
        $catalog = Image::paginate(6);

        return view('pages.car-catalog.car_catalog', compact('catalog'));
    }

    public function create()
    {
        return view('pages.spare-part.create-sparepart');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'img' => 'required',
            'description' => 'required'
        ], [
            'name.required' => 'Field nama harus diisi',
            'phone_number.required' => 'Field nomor telepon harus diisi',
            'img.required' => 'Field gambar harus diisi',
            'description.required' => 'Field deksripsi harus diisi',
        ]);

        try {
            $filename = hash('sha256', time() . '-' . $request->file('img')->getClientOriginalName()) . '.' . $request->file('img')->extension();

            SparePart::create([
                'uuid' => Uuid::uuid4(),
                'name' => $request->name,
                'price' => doubleval($request->price),
                'img_url' => $filename,
                'description' => $request->description,
            ]);

            $request->file('img')->storeAs('public/sparepart/', $filename);

            return redirect()->route('sparepart.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data' . $e->getMessage());
        }
    }

    public function detail(string $uuid)
    {
        $sparepart = SparePart::where('uuid', $uuid)->first();

        return view('pages.spare-part.detail-sparepart', compact('sparepart'));
    }

    public function edit(string $uuid)
    {
        $sparepart = SparePart::where('uuid', $uuid)->first();

        if ($sparepart == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.spare-part.edit-sparepart', compact('sparepart'));
    }

    public function update(Request $request, string $uuid)
    {
        try {
            $sparepart = SparePart::where('uuid', $uuid)->first();

            if ($request->file() == []) {
                $sparepart->update([
                    'name' => $request->name,
                    'price' => $request->price,
                    'description' => $request->description,
                ]);

                return redirect()->route('sparepart.index')->with('success', 'Berhasil mengedit data');
            }

            $filename = hash('sha256', time() . '-' . $request->file('img')->getClientOriginalName()) . '.' . $request->file('img')->extension();

            $sparepart->update([
                'name' => $request->name,
                'price' => $request->price,
                'img_url' => $filename,
                'description' => $request->description,
            ]);

            if (Storage::exists('/public/sparepart/' . $sparepart->img_url)) {
                Storage::delete('/public/sparepart/' . $sparepart->img_url);
            }
            $request->file('img')->storeAs('public/sparepart/', $filename);

            return redirect()->route('sparepart.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data');
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $sparepart = SparePart::where('uuid', $uuid)->first();

            $sparepart->delete();

            return redirect()->route('sparepart.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
