<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Promo;

class GeneralController extends Controller
{
    public function promos()
    {
        try {
            $promos = Promo::all();

            return response()->json(new ResponseResource('Berhasil mendapatkan data', [
                'promos' => $promos->map(function ($promos) {
                    return [
                        'id' => $promos->id,
                        'uuid' => $promos->uuid,
                        'img_url' => asset('storage/sparepart/' . $promos->img_url)
                    ];
                })
            ]), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mendapatkan data: ' . $e->getMessage()]);
        }
    }
}
