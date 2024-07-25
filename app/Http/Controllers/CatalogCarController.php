<?php

namespace App\Http\Controllers;

use App\Models\CatalogCars;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;

class CatalogCarController extends Controller
{
    public function index()
    {
        $catalog = CatalogCars::paginate(6);

        return view('pages.car-catalog.car_catalog', compact('catalog'));
    }

    public function create()
    {
        return view('pages.car-catalog.create-car_catalog');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'type' => 'required',
            'img' => 'required',
            'description' => 'required'
        ], [
            'name.required' => 'Field nama harus diisi',
            'price.required' => 'Field harga harus diisi',
            'type.required' => 'Field jenis mobil harus diisi',
            'img.required' => 'Field gambar harus diisi',
            'description.required' => 'Field deksripsi harus diisi',
        ]);

        try {
            $catalog = CatalogCars::create([
                'uuid' => Uuid::uuid4(),
                'name' => $request->name,
                'price' => doubleval($request->price),
                'description' => $request->description,
            ]);

            DB::transaction(function () use ($request, $catalog) {
                foreach ($request->file('img') as $item) {
                    $filename = hash('sha256', time() . '-' . $item->getClientOriginalName()) . '.' . $item->extension();

                    Image::create([
                        'uuid' => Uuid::uuid4(),
                        'catalog_cars_id' => $catalog->id,
                        'img_url' => $filename,
                    ]);

                    $item->storeAs('public/catalog_cars/', $filename);
                }
            });

            return redirect()->route('catalog.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data' . $e->getMessage());
        }
    }

    public function detail(string $uuid)
    {
        $catalog = CatalogCars::where('uuid', $uuid)->first();

        return view('pages.car-catalog.detail-car_catalog', compact('catalog'));
    }

    public function edit(string $uuid)
    {
        $catalog = CatalogCars::where('uuid', $uuid)->first();

        if ($catalog == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.car-catalog.edit-car_catalog', compact('catalog'));
    }

    public function update(Request $request, string $uuid)
    {
        try {
            $catalog = CatalogCars::where('uuid', $uuid)->first();
            if ($request->file() == []) {
                $catalog->update([
                    'name' => $request->name,
                    'price' => doubleval($request->price),
                    'type' => $request->type,
                    'description' => $request->description,
                ]);

                return redirect()->route('catalog.index')->with('success', 'Berhasil mengedit data');
            }
            
            
            DB::transaction(function () use ($request, $catalog) {
                if (Storage::exists('/public/catalog_cars/' . $request->file('img'))) {
                    Storage::delete('/public/catalog_cars/' . $request->file('img'));
                }
                foreach ($request->file('img') as $item) {
                    $filename = hash('sha256', time() . '-' . $item->getClientOriginalName()) . '.' . $item->extension();
                    $catalog->update([
                        'name' => $request->name,
                        'price' => $request->price,
                        'description' => $request->description,
                    ]);


                    $image = $item->delete();


                    $img = Image::where('catalog_id', $catalog->id)->first();
                    $img->update([
                        'img_url' => $filename,
                    ]);

                    $item->storeAs('public/catalog_cars/', $filename);
                }
            });

            // DB::transaction(function () use ($request, $catalog) {
            //     $catalog->update([
            //         'name' => $request->name,
            //         'price' => $request->price,
            //         'description' => $request->description,
            //     ]);

            //     foreach ($request->file('img') as $item) {
            //         $filename = hash('sha256', time() . '-' . $item->getClientOriginalName()) . '.' . $item->extension();
            //         $storagePath = 'public/catalog_cars/' . $filename;

            //         $item->storeAs('public/catalog_cars', $filename);

            //         $img = Image::where('catalog_cars_id', $catalog->id)->first();

            //         if ($img && Storage::exists('public/catalog_cars/' . $img->img_url)) {
            //             Storage::delete('public/catalog_cars/' . $img->img_url);
            //         }

            //         $img->update([
            //             'img_url' => $filename,
            //         ]);
            //     }
            // });

            return redirect()->route('catalog.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data' . $e->getMessage());
        }
    }

    public function destroy(string $uuid)
    {
        try {
            $catalog = CatalogCars::where('uuid', $uuid)->first();

            $catalog->delete();

            return redirect()->route('catalog.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }
}
