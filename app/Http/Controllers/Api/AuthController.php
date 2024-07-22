<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Client as ModelsClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|string|min:8',
        ]);

        try {
            $client = ModelsClient::where('phone_number',$request['username'])->first();
            if(!$client || !Hash::check($request['password'],$client->password)){
                return response()->json([
                    'message' => 'Kredensial tidak valid'
                ],401);
            }
            $token = $client->createToken($client->name.'-AuthToken')->plainTextToken;

            return response()->json(new ResponseResource('Login berhasil', [
                'token' => $token,
                'name' => $client->name,
                'phone' => $client->phone_number,
            ]), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Login gagal: ' . $e->getMessage()]);
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
    
            return response()->json(new ResponseResource('Logout berhasil', []), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Logout gagal: ' . $e->getMessage()]);
        }
    }
}
