<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\client;
use App\Models\Client as ModelsClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|lowercase|unique:clients,email',
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string|max:14',
            'address' => 'required|string|max:255',
        ]);
        
        try {
            DB::transaction(function() use ($request) {
                ModelsClient::create([
                    'uuid' => Uuid::uuid4(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                ]);
            });
        
            return response()->json(new ResponseResource('Berhasil membuat akun', []), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat akun: ' . $e->getMessage()], 500);
        }
    }
}
