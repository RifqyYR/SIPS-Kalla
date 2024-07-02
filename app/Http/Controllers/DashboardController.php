<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'labels' => ['Category A', 'Category B'],
            'data' => [25, 30],
        ];
        return view('dashboard', compact('data'));
    }
}
