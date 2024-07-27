<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ResponseResource;
use App\Models\PersonInCharge;
use App\Models\Promo;
use App\Models\Sales;
use App\Models\SparePart;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function promos()
    {
        try {
            $promos = Promo::all();

            return response()->json(new ResponseResource('Berhasil mendapatkan data', 
                $promos->map(function ($promos) {
                    return [
                        'id' => $promos->id,
                        'imageUrl' => asset('storage/promo/' . $promos->img_url)
                    ];
                })
            ), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mendapatkan data: ' . $e->getMessage()]);
        }
    }

    public function sales()
    {
        try {
            $sales = Sales::all();

            return response()->json(new ResponseResource('Berhasil mendapatkan data', 
                $sales->map(function ($sales) {
                    return [
                        'id' => $sales->id,
                        'imageUrl' => asset('storage/sales/' . $sales->img_url),
                        'name' => $sales->name,
                        'description' => $sales->description,
                        'phone_number' => $sales->phone_number,
                        'leads' => $sales->sales,
                    ];
                })
            ), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mendapatkan data: ' . $e->getMessage()]);
        }
    }

    public function pic()
    {
        try {
            $pic = PersonInCharge::all();

            return response()->json(new ResponseResource('Berhasil mendapatkan data', $pic), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mendapatkan data: ' . $e->getMessage()]);
        }
    }

    public function detailSales(int $id)
    {
        try {
            $sales = Sales::where('id', $id)->first();

            if (!$sales) return response()->json(new ResponseResource('Data tidak ditemukan', null), 404);

            return response()->json(new ResponseResource('Berhasil mendapatkan data', $sales), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mendapatkan data: ' . $e->getMessage()]);
        }
    }

    public function leadsSales(Request $request)
    {
        $request->validate([
            'sales_id' => 'required'
        ]);

        try {
            $sales = Sales::where('id', $request->sales_id)->first();

            if (!$sales) return response()->json(new ResponseResource('Data tidak ditemukan', null), 404);

            $sales->update([
                'leads' => $sales->leads + 1
            ]);
            
            return response()->json(new ResponseResource('Berhasil menambah data', $sales), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mendapatkan data: ' . $e->getMessage()]);
        }
    }

    public function sparepart()
    {
        try {
            $sparepart = SparePart::all();

            return response()->json(new ResponseResource('Berhasil mendapatkan data', 
            $sparepart->map(function ($sparepart) {
                return [
                    'id' => $sparepart->id,
                    'name' => $sparepart->name,
                    'price' => $sparepart->price,
                    'imageUrl' => asset('storage/sparepart/' . $sparepart->img_url),
                    'description' => $sparepart->description,
                ];
            })
        ), 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mendapatkan data: ' . $e->getMessage()]);
        }
    }
}
