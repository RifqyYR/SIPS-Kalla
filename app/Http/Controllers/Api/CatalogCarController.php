<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\CatalogCars;

class CatalogCarController extends Controller
{
    public function getUsedCars()
    {
        try {
            $usedCars = CatalogCars::where('type', CatalogCars::TYPE_USED)->with('images')->get();

            if ($usedCars->isEmpty()) return response()->json(new ResponseResource('Tidak ada data', []), 404);

            return response()->json(new ResponseResource('Berhasil mendapatkan data', [
                'cars' => $usedCars->map(function ($usedCars) {
                    return [
                        'imageUrls' => $usedCars->images->map(function($image) {
                            return asset('storage/catalog_cars/' . $image->img_url);
                        }),
                        'carName' => $usedCars->name,
                        'descriptionHTML' => $usedCars->description,
                    ];
                })
            ]), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan data: ' . $e->getMessage()
            ], 404);
        }
    }

    public function getNewCars()
    {
        try {
            $usedCars = CatalogCars::where('type', CatalogCars::TYPE_NEW)->with('images')->get();

            if ($usedCars->isEmpty()) return response()->json(new ResponseResource('Tidak ada data', []), 404);

            return response()->json(new ResponseResource('Berhasil mendapatkan data', [
                'cars' => $usedCars->map(function ($usedCars) {
                    return [
                        'imageUrls' => $usedCars->images->map(function($image) {
                            return asset('storage/catalog_cars/' . $image->img_url);
                        }),
                        'carName' => $usedCars->name,
                        'descriptionHTML' => $usedCars->description,
                    ];
                })
            ]), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan data: ' . $e->getMessage()
            ], 404);
        }
    }

    public function detailUsedCar(int $id)
    {
        try {
            $car = CatalogCars::where('id', $id)->where('type', CatalogCars::TYPE_USED)->with('images')->first();

            if (!$car) return response()->json(new ResponseResource('Data tidak ditemukan', null), 404);

            return response()->json(new ResponseResource('Berhasil mendapatkan data', $car), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan data: ' . $e->getMessage()
            ], 404);
        }
    }

    public function detailNewCar(int $id)
    {
        try {
            $car = CatalogCars::where('id', $id)->where('type', CatalogCars::TYPE_NEW)->with('images')->first();

            if (!$car) return response()->json(new ResponseResource('Data tidak ditemukan', null), 404);

            return response()->json(new ResponseResource('Berhasil mendapatkan data', $car), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan data: ' . $e->getMessage()
            ], 404);
        }
    }
}
