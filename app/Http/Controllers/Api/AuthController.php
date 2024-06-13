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
