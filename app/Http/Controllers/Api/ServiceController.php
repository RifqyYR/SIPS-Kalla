<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ServiceController extends Controller
{
    public function bookingService(Request $request)
    {
        $request->validate([
            'client_car_id' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'vehicle_km' => 'required|integer',
            'service_type' => 'required|string',
        ]);

        try {
            $user = Auth::user();
            $client = Client::where('id', $user->id)->first();

            $clientCarsIds = $client->cars->pluck('id')->toArray();
            
            if (!in_array($request->client_car_id, $clientCarsIds)) {
                return response()->json([
                    'message' => 'Mobil tidak ditemukan'
                ],404);
            }

            DB::transaction(function() use ($client, $request) {
                Service::create([
                    'uuid' => Uuid::uuid4(),
                    'client_id' => $client->id,
                    'client_car_id' => $request->client_car_id,
                    'date' => $request->date,
                    'time' => $request->time,
                    'type' => Service::TYPE_BOOK,
                    'vehicle_km' => $request->vehicle_km,
                    'additional_info' => $request->additional_info,
                    'service_type' => $request->service_type,
                    'status' => Service::STATUS_WAITING,
                ]);
            });
            
            return response()->json(new ResponseResource('Berhasil melakukan booking', []), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal melakukan booking: ' . $e->getMessage()]);
        }
    }

    public function visitService(Request $request)
    {
        $request->validate([
            'client_car_id' => 'required|integer',
            'date' => 'required|date',
            'time' => 'required',
            'vehicle_km' => 'required|integer',
            'service_type' => 'required|string',
            'address' => 'required|string',
            'lat' => 'required|numeric',
            'long' => 'required|numeric'
        ]);

        try {
            $user = Auth::user();
            $client = Client::where('id', $user->id)->first();

            $clientCarsIds = $client->cars->pluck('id')->toArray();
            
            if (!in_array($request->client_car_id, $clientCarsIds)) {
                return response()->json([
                    'message' => 'Mobil tidak ditemukan'
                ],404);
            }

            DB::transaction(function() use ($client, $request) {
                Service::create([
                    'uuid' => Uuid::uuid4(),
                    'client_id' => $client->id,
                    'client_car_id' => $request->client_car_id,
                    'date' => $request->date,
                    'time' => $request->time,
                    'type' => Service::TYPE_VISIT,
                    'vehicle_km' => $request->vehicle_km,
                    'additional_info' => $request->additional_info,
                    'service_type' => $request->service_type,
                    'status' => Service::STATUS_WAITING,
                    'address' => $request->address,
                    'lat' => $request->lat,
                    'long' => $request->long,
                ]);
            });
            
            return response()->json(new ResponseResource('Berhasil melakukan booking', []), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal melakukan booking: ' . $e->getMessage()]);
        }
    }
}
