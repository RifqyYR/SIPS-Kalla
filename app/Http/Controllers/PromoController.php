<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::paginate(10);

        return view('pages.promo.promo', compact('promos'));
    }

    public function create()
    {
        return view('pages.promo.create-promo');
    }

    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|file'
        ]);

        try {
            $filename = hash('sha256', time() . '-' . $request->file('img')->getClientOriginalName()) . '.' . $request->file('img')->extension();
            $request->file('img')->storeAs('public/promo/', $filename);

            Promo::create([
                'uuid' => Uuid::uuid4(),
                'img_url' => $filename
            ]);

            return redirect()->route('promo.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data');
        }
    }

    public function edit(string $uuid)
    {
        $promo = Promo::where('uuid', $uuid)->first();

        if ($promo == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.promo.edit-promo', compact('promo'));
    }

    public function update(Request $request, string $uuid)
    {
        $request->validate([
            'img' => 'required|file'
        ]);

        try {
            $promo = Promo::where('uuid', $uuid)->first();

            $filename = hash('sha256', time() . '-' . $request->file('img')->getClientOriginalName()) . '.' . $request->file('img')->extension();
            $request->file('img')->storeAs('public/promo/', $filename);

            if (Storage::exists('/public/promo/' . $promo->img_url)) {
                Storage::delete('/public/promo/' . $promo->img_url);
            }

            $promo->update([
                'img_url' => $filename
            ]);

            return redirect()->route('promo.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data');
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $promo = Promo::where('uuid', $uuid)->first();

            $promo->delete();

            return redirect()->route('promo.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}