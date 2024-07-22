<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class SuggestionController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'content' => 'required|string'
        ]);

        try {
            $user = Auth::user();

            DB::transaction(function () use ($request, $user) {
                Suggestion::create([
                    'uuid' => Uuid::uuid4(),
                    'content' => $request->content,
                    'clients_id' => $user->id,
                ]);
            });

            return response()->json(new ResponseResource('Kritik dan saran Anda telah terkirim!', []), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal membuat kritik dan saran: ' . $e->getMessage()]);
        }
    }

    public function getUserSuggestions()
    {
        try {
            $user = Auth::user();
            $suggestions = Suggestion::where('clients_id', $user->id)->get();

            return response()->json(new ResponseResource('Berhasil mendapatkan data!', [
                'suggestions' => $suggestions->map(function ($suggestion) {
                    return [
                        'id' => $suggestion->id,
                        'content' => $suggestion->content,
                        'created_at' => $suggestion->created_at,
                        'updated_at' => $suggestion->updated_at,
                        'client_name' => $suggestion->client->name,
                    ];
                }),
            ]), 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Gagal mendapatkan data kritik dan saran: ' . $e->getMessage()
            ], 404);
        }
    }
}
