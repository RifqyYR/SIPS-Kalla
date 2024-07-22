<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard');
    }

    public function getDataPie()
    {
        $data = [
            'labels' => ['Category A', 'Category B'],
            'data' => [25, 30],
        ];
        return response()->json($data);
    }
}
