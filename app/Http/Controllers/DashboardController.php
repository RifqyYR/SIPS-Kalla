<?php

namespace App\Http\Controllers;

use App\Models\CatalogCars;
use App\Models\Client;
use App\Models\PersonInCharge;
use App\Models\Promo;
use App\Models\Sales;
use App\Models\Service;
use App\Models\SparePart;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $customer = Client::get('name');
        $sparepart = SparePart::get('name');
        $leads = Sales::get('leads');
        $pic = PersonInCharge::get('name');
        $promo = Promo::get('id');
        $admin = User::get('name');

        $data = array(
            'customer' => count($customer),
            'sparepart' => count($sparepart),
            'leads' => count($leads),
            'pic' => count($pic),
            'promo' => count($promo),
            'admin' => count($admin),
        );
        return view('pages.dashboard', $data);
    }

    public function getDataPie()
    {
        $typeCounts = CatalogCars::select('type', DB::raw('count(*) as total'))
            ->groupBy('type')
            ->get()
            ->pluck('total', 'type');

        $data = [
            'data' => [
                ['name' => 'Baru', 'y' => $typeCounts['NEW'] ?? 0],
                ['name' => 'Bekas', 'y' => $typeCounts['USED'] ?? 0],
            ]
        ];
        return response()->json($data);
    }

    public function getDataLine()
    {
        $startOfYear = Carbon::now()->startOfYear();
        $endOfYear = Carbon::now()->endOfYear();

        $data = Service::select(DB::raw("type, MONTH(date) as month, COUNT(*) as total"))
            ->whereBetween('date', [$startOfYear, $endOfYear])
            ->whereIn('type', ['BOOK', 'VISIT'])
            ->groupBy('type', 'month')
            ->get();

        $formattedData = $this->formatDataForChart($data);

        return response()->json($formattedData);
    }

    private function formatDataForChart($data)
    {
        $months = range(1, 12);
        $results = [
            'BOOK' => array_fill(1, 12, 0),
            'VISIT' => array_fill(1, 12, 0)
        ];

        foreach ($data as $entry) {
            if (array_key_exists($entry->type, $results)) {
                $results[$entry->type][$entry->month] = (int)$entry->total;
            }
        }

        Carbon::setLocale('id');

        return [
            'categories' => array_map(function ($month) {
                return Carbon::createFromFormat('m', $month)->isoFormat('MMMM');
            }, $months),
            'series' => [
                ['name' => 'Servis Reservasi', 'data' => array_values($results['BOOK'])],
                ['name' => 'Servis Kunjungan', 'data' => array_values($results['VISIT'])]
            ]
        ];
    }
}
