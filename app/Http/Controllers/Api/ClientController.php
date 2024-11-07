<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function getClientCars()
    {
        try {
            $user = Auth::user();
            $client = Client::where('id', $user->id)->first();

            // Mengubah last_service_km dari int menjadi string
            $cars = $client->cars->map(function ($car) {
                // Mengubah last_service_km menjadi string
                $car->last_service_km = (string)$car->last_service_km;
                return $car;
            });

            // Mengembalikan response JSON dengan data mobil yang sudah dimodifikasi
            return response()->json(new ResponseResource('Berhasil mendapatkan data', $cars), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan data: ' . $e->getMessage()
            ], 404);
        }
    }
}
