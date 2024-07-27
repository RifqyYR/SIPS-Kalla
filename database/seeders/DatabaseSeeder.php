<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'uuid' => Uuid::uuid4(),
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make(env('DEFAULT_PASSWORD')),
        ]);

        DB::table('clients')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'Rifqy',
            'email' => 'rifqy@gmail.com',
            'phone_number' => '0895800859692',
            'address' => 'Jl. Poros Malino',
            'password' => Hash::make(env('DEFAULT_PASSWORD')),
        ]);

        DB::table('clients')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'Ami',
            'email' => 'ami@gmail.com',
            'phone_number' => '0895800859693',
            'address' => 'Ponre',
            'password' => Hash::make(env('DEFAULT_PASSWORD')),
        ]);

        DB::table('catalog_cars')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'Toyota Veloz 2024',
            'price' => 'Rp. 300.000.000',
            'type' => 'NEW',
            'description' => '<p>Toyota Veloz 2024 adalah 7 Seater MPV yang tersedia dalam daftar harga Rp&nbsp;304,4 Juta di Indonesia. It is available in 4 variants, 1 engine, and 2 transmissions option: Manual dan CVT in the Indonesia. Mobil ini memiliki ground clearance 205 mm dengan dimensi sebagai berikut: 4475 mm L x 1750 mm W x 1700 mm H. Lebih dari 99 pengguna telah memberikan penilaian untuk Veloz berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Toyota Veloz adalah Xpander, Ertiga, Avanza dan Livina . Cicilan bulanan terendah dimulai dari Rp&nbsp;14,44 Juta (selama 60 bulan).</p>',
        ]);

        DB::table('catalog_cars')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'Toyota Fortuner 2020',
            'price' => 'Rp. 500.000.000',
            'type' => 'USED',
            'description' => '<p>Toyota Fortuner 2024 adalah 7 Seater MPV yang tersedia dalam daftar harga Rp&nbsp;304,4 Juta di Indonesia. It is available in 4 variants, 1 engine, and 2 transmissions option: Manual dan CVT in the Indonesia. Mobil ini memiliki ground clearance 205 mm dengan dimensi sebagai berikut: 4475 mm L x 1750 mm W x 1700 mm H. Lebih dari 99 pengguna telah memberikan penilaian untuk Fortuner berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Toyota Fortuner adalah Xpander, Ertiga, Avanza dan Livina . Cicilan bulanan terendah dimulai dari Rp&nbsp;14,44 Juta (selama 60 bulan).</p>',
        ]);

        DB::table('catalog_cars')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'Yaris',
            'price' => 'Rp. 300.000.000',
            'type' => 'NEW',
            'description' => '<p>Toyota Fortuner 2024 adalah 7 Seater MPV yang tersedia dalam daftar harga Rp&nbsp;304,4 Juta di Indonesia. It is available in 4 variants, 1 engine, and 2 transmissions option: Manual dan CVT in the Indonesia. Mobil ini memiliki ground clearance 205 mm dengan dimensi sebagai berikut: 4475 mm L x 1750 mm W x 1700 mm H. Lebih dari 99 pengguna telah memberikan penilaian untuk Fortuner berdasarkan fitur, jarak tempuh, kenyamanan tempat duduk dan kinerja mesin. Pesaing terdekat Toyota Fortuner adalah Xpander, Ertiga, Avanza dan Livina . Cicilan bulanan terendah dimulai dari Rp&nbsp;14,44 Juta (selama 60 bulan).</p>',
        ]);

        DB::table('client_cars')->insert([
            'uuid' => Uuid::uuid4(),
            'car_type' => 'Toyota Veloz 2023',
            'plate_number' => 'DD 1111 LU',
            'last_service_date' => '2024-06-25',
            'last_service_km' => 3000,
            'client_id' => 1
        ]);

        DB::table('services')->insert([
            'uuid' => Uuid::uuid4(),
            'date' => '2024-06-25',
            'time' => '10:00:00',
            'type' => 'BOOK',
            'vehicle_km' => 3000,
            'additional_info' => 'Tidak ada',
            'service_type' => 'Servis Aki',
            'status' => 'WAITING',
            'client_id' => 1,
            'client_car_id' => 1
        ]);

        DB::table('services')->insert([
            'uuid' => Uuid::uuid4(),
            'date' => '2024-07-25',
            'time' => '10:00:00',
            'type' => 'BOOK',
            'vehicle_km' => 3000,
            'additional_info' => 'Tidak ada',
            'service_type' => 'Servis Aki',
            'status' => 'WAITING',
            'client_id' => 1,
            'client_car_id' => 1
        ]);

        DB::table('services')->insert([
            'uuid' => Uuid::uuid4(),
            'date' => '2024-05-25',
            'time' => '10:00:00',
            'type' => 'VISIT',
            'vehicle_km' => 3000,
            'additional_info' => 'Tidak ada',
            'service_type' => 'Servis Aki',
            'status' => 'WAITING',
            'client_id' => 1,
            'client_car_id' => 1
        ]);

        DB::table('images')->insert([
            'uuid' => Uuid::uuid4(),
            'img_url' => 'toyota-veloz.webp',
            'catalog_cars_id' => 2
        ]);

        DB::table('images')->insert([
            'uuid' => Uuid::uuid4(),
            'img_url' => 'toyota-veloz-2.webp',
            'catalog_cars_id' => 2
        ]);

        DB::table('images')->insert([
            'uuid' => Uuid::uuid4(),
            'img_url' => 'toyota-veloz-3.webp',
            'catalog_cars_id' => 2
        ]);
    }
}
