<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ClientCars;
use Carbon\Carbon;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    private function validateClientAndCars(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:clients,email',
            'phone_number' => 'required|unique:clients,phone_number|digits_between:10,15',
            'address' => 'required',
        ], [
            'name.required' => 'Input nama harus diisi',
            'email.required' => 'Input email harus diisi',
            'email.email' => 'Masukkan email yang valid',
            'email.unique' => 'Email ini sudah digunakan',
            'phone_number.required' => 'Field nomor telepon harus diisi',
            'phone_number.unique' => 'Nomor telepon ini sudah digunakan',
            'phone_number.digits_between' => 'Masukkan nomor telepon yang sesuai',
            'address.required' => 'Field alamat harus diisi',
        ]);

        $request->validate([
            'car_type.*' => 'required',
            'plate_number.*' => 'required|unique:client_cars,plate_number',
            'last_service_km.*' => 'required|integer|min:0'
        ], [
            'car_type.*.required' => 'Field tipe mobil harus diisi',
            'plate_number.*.required' => 'Field plat kendaraan harus diisi',
            'plate_number.*.unique' => 'Plat kendaraan sudah terdaftar',
            'last_service_km.*.required' => 'Field jarak tempuh kendaraan harus diisi',
            'last_service_km.*.integer' => 'Field jarak tempuh harus berupa angka',
            'last_service_km.*.min' => 'Field jarak tempuh tidak boleh kurang dari 0',
        ]);
    }

    public function index()
    {
        $clients = Client::paginate(10);

        return view('pages.customer.customer', compact('clients'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Search by name
        $results = Client::where('name', 'LIKE', "%{$query}%")->paginate(10);

        $results->appends(['query' => $query]);

        return response()->json([
            'data' => $results,
            'firstItem' => $results->firstItem(),
            'lastItem' => $results->lastItem(),
            'total' => $results->total(),
            'links' => $results->links('components.pagination')->render(),
        ]);
    }

    public function create()
    {
        return view('pages.customer.create-customer');
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                $this->validateClientAndCars($request);

                $client = Client::create([
                    'uuid' => Uuid::uuid4(),
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->phone_number),
                    'phone_number' => $request->phone_number,
                    'address' => $request->address,
                ]);

                for ($i = 0; $i < count($request->car_type); $i++) {
                    ClientCars::create([
                        'uuid' => Uuid::uuid4(),
                        'client_id' => $client->id,
                        'car_type' => $request->car_type[$i],
                        'plate_number' => $request->plate_number[$i],
                        'last_service_date' => $request->last_service_date[$i],
                        'last_service_km' => $request->last_service_km[$i]
                    ]);
                }
            });

            return redirect()->route('customer.index')->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data: ' . $e->getMessage());
        }
    }

    public function edit(string $uuid)
    {
        $client = Client::where('uuid', $uuid)->first();

        if ($client == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.customer.edit-customer', compact('client'));
    }

    // public function update(Request $request, string $uuid)
    // {
    //     try {
    //         // Validate Input
    //         $request->validate([
    //             'name' => 'required',
    //             'email' => 'required|email',
    //             'phone_number' => 'required|digits_between:10,15',
    //             'address' => 'required'
    //         ], [
    //             'name.required' => 'Input nama harus diisi',
    //             'email.required' => 'Input email harus diisi',
    //             'email.email' => 'Masukkan email yang valid',
    //             'phone_number.required' => 'Field nomor telepon harus diisi',
    //             'phone_number.digits_between' => 'Masukkan nomor telepon yang sesuai',
    //             'address.required' => 'Field alamat harus diisi',
    //         ]);

    //         $client = Client::where('uuid', $uuid)->first();

    //         $client->update([
    //             'name' => $request->name,
    //             'email' => $request->email,
    //             'phone_number' => $request->phone_number,
    //             'address' => $request->address
    //         ]);

    //         return redirect()->route('customer.index')->with('success', 'Berhasil mengedit data');
    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Gagal mengedit data: ' . $e->getMessage());
    //     }
    // }

    public function update(Request $request, string $uuid)
    {
        try {
            // Validate Input
            $validated = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'phone_number' => 'required|digits_between:10,15',
                'address' => 'required',
                'change_password' => 'required|in:yes,no',
                'new_password' => 'nullable|required_if:change_password,yes|string|min:8|confirmed'
            ], [
                // Validation messages...
                'new_password.required_if' => 'Kata sandi baru diperlukan jika perubahan kata sandi diatur ke "Ya".',
                'new_password.min' => 'Kata sandi baru harus minimal 8 karakter',
                'new_password.confirmed' => 'Konfirmasi kata sandi baru tidak cocok',
            ]);

            $client = Client::where('uuid', $uuid)->first();
            if (!$client) {
                return redirect()->back()->with('error', 'Data Customer tidak ditemukan.');
            }

            $client->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone_number' => $validated['phone_number'],
                'address' => $validated['address'],
            ]);

            if ($request->change_password === 'yes') {
                $client->password = Hash::make($validated['new_password']);
                $client->save();
            }

            return redirect()->route('customer.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data customer');
        }
    }


    public function destroy(string $uuid)
    {
        try {
            $client = Client::where('uuid', $uuid)->first();

            $client->delete();

            return redirect()->route('customer.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data');
        }
    }

    public function detail(string $uuid)
    {
        $clients = Client::where('uuid', $uuid)->first();

        return view('pages.customer.detail-customer', compact('clients'));
    }

    public function createCar(string $uuid)
    {
        return view('pages.customer.create-car', ['uuid' => $uuid]);
    }

    public function storeCar(Request $request, string $uuid)
    {
        $request->validate([
            'car_type.*' => 'required',
            'plate_number.*' => 'required|unique:client_cars,plate_number',
            'last_service_date.*' => 'required|date',
            'last_service_km.*' => 'required|integer|min:0'
        ], [
            'car_type.*.required' => 'Field tipe mobil harus diisi',
            'plate_number.*.required' => 'Field plat kendaraan harus diisi',
            'plate_number.*.unique' => 'Plat kendaraan sudah terdaftar',
            'last_service_date.*.required' => 'Field waktu service terakhir harus diisi',
            'last_service_km.*.required' => 'Field jarak tempuh kendaraan harus diisi',
            'last_service_km.*.integer' => 'Field jarak tempuh harus berupa angka',
            'last_service_km.*.min' => 'Field jarak tempuh tidak boleh kurang dari 0',
        ]);

        try {
            $client = Client::where('uuid', $uuid)->first();
            DB::transaction(function () use ($request, $client) {
                for ($i = 0; $i < count($request->car_type); $i++) {
                    ClientCars::create([
                        'uuid' => Uuid::uuid4(),
                        'client_id' => $client->id,
                        'car_type' => $request->car_type[$i],
                        'plate_number' => $request->plate_number[$i],
                        'last_service_date' => $request->last_service_date[$i],
                        'last_service_km' => $request->last_service_km[$i]
                    ]);
                }
            });

            return redirect()->route('customer.detail', $client->uuid)->with('success', 'Berhasil menambahkan data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan data' . $e->getMessage());
        }
    }

    public function destroyCar(string $uuid)
    {
        try {
            $car = ClientCars::where('uuid', $uuid)->first();
            $car->delete();

            return redirect()->route('customer.index')->with('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menghapus data' . $e->getMessage());
        }
    }

    public function editCar(string $uuid)
    {
        $car = ClientCars::where('uuid', $uuid)->first();

        if ($car == null) return redirect()->back()->with('error', 'Gagal mendapatkan data');

        return view('pages.customer.edit-car', compact('car'));
    }

    public function updateCar(Request $request, string $uuid)
    {
        try {
            // Validate Input
            $request->validate([
                'car_type' => 'required',
                'plate_number' => 'required',
                'last_service_date' => 'required|date',
                'last_service_km' => 'required|integer|min:0'
            ], [
                'car_type.required' => 'Field tipe mobil harus diisi',
                'plate_number.required' => 'Field plat kendaraan harus diisi',
                'last_service_date.required' => 'Field jadwal service terakhir harus diisi',
                'last_service_km.required' => 'Field jarak tempuh kendaraan harus diisi',
                'last_service_km.integer' => 'Field jarak tempuh harus berupa angka',
                'last_service_km.min' => 'Field jarak tempuh tidak boleh kurang dari 0',
            ]);

            $car = ClientCars::where('uuid', $uuid)->first();

            $car->update([
                'car_type' => $request->car_type,
                'plate_number' => $request->plate_number,
                'last_service_date' => $request->last_service_date,
                'last_service_km' => $request->last_service_km,
            ]);

            return redirect()->route('customer.index')->with('success', 'Berhasil mengedit data');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengedit data');
        }
    }
}
