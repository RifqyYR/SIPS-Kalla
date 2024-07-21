<?php

namespace App\Http\Controllers;

use App\Models\SparePart;
use Illuminate\Http\Request;

class SparePartController extends Controller
{
    public function index()
    {
        $sparepart = SparePart::paginate(8);

        return view('pages.spare-part.sparepart', compact('sparepart'));
    }

    public function detail(string $uuid)
    {
        $sparepart = SparePart::where('uuid', $uuid)->first();

        return view('pages.spare-part.detail-sparepart', compact('sparepart'));
    }
}
