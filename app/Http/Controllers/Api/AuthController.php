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

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|lowercase',
            'password' => 'required|string|min:8',
        ]);

        try {
            $user = ModelsClient::where('email',$request['email'])->first();
            if(!$user || !Hash::check($request['password'],$user->password)){
                return response()->json([
                    'message' => 'Kredensial tidak valid'
                ],401);
            }
            $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;
            return response()->json([
                'access_token' => $token,
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal login: ' . $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->bearerToken();

        return response()->json([
            'test' => $user
        ]);
    }
}
