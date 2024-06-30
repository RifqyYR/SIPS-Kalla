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
            $usedCars = CatalogCars::where('type', 'USED')->with('images')->get();

            if ($usedCars->isEmpty()) {
                return response()->json(new ResponseResource('Tidak ada data', []), 404);
            }

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
            $usedCars = CatalogCars::where('type', 'NEW')->with('images')->get();

            if ($usedCars->isEmpty()) {
                return response()->json(new ResponseResource('Tidak ada data', []), 404);
            }

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
}
