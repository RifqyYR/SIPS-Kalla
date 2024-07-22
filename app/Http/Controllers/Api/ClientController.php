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

            return response()->json(new ResponseResource('Berhasil mendapatkan data', $client->cars), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan data: ' . $e->getMessage()
            ], 404);
        }
    }
}
