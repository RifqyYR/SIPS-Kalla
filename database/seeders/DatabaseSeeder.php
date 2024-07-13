<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CatalogCars;
use App\Models\Client;
use App\Models\ClientCars;
use App\Models\PersonInCharge;
use App\Models\Promo;
use App\Models\Sales;
use App\Models\Service;
use App\Models\SparePart;
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

        DB::table('spare_parts')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'Kampas Kopling',
            'img_url' => 'kampas.jpg',
            'price' => 537000,
            'description' => '<div class="cttcWrap">
                <p class="conAreaM" id="item_contents">
                    </p><p>Kampas kopling mobil adalah salah satu komponen yang sangat penting. Namun, banyak di antara kita yang mungkin tidak terlalu memperhatikan perawatan kampas kopling mobil, padahal kerusakan pada komponen ini bisa menyebabkan berbagai masalah dan kerugian, termasuk membahayakan keselamatan berkendara.</p><p><br></p><p>Ketika berbicara mengenai kampas kopling mobil, mungkin banyak yang merasa bahwa komponen ini agak teknis dan sulit dipahami. Oleh karena itu, artikel ini akan memberikan penjelasan mendalam tentang kampas kopling mobil dan apa yang perlu dilakukan untuk menjaganya agar tetap berfungsi dengan baik.</p><p><br></p><p><br></p><p><strong><span style="font-size: 24.0px;">Apa Itu Kampas Kopling Mobil dan Fungsinya?</span></strong></p><p><br></p><p>Kampas kopling mobil merupakan salah satu komponen penting pada mobil yang berfungsi sebagai penghubung antara mesin dan transmisi. Secara umum, kampas kopling mobil berfungsi untuk menghubungkan atau memutuskan aliran tenaga dari mesin ke transmisi sehingga mobil bisa bergerak.&nbsp;</p><p><br></p><p>Kampas mobil juga membantu menstabilkan gerakan mobil saat memindahkan gigi, sehingga pengemudi bisa mengendalikan mobil dengan lebih mudah. Hebatnya, fitur ini punya fungsi lain yang juga menunjang keselamatan pengendara.</p><p><br></p><p>Berikut ini adalah beberapa fungsi kampas kopling mobil secara lebih rinci:</p><p><br></p><p>1. Memutuskan aliran tenaga dari mesin ke transmisi ketika mobil sedang berhenti atau gigi dalam posisi netral.<br>2. Menghubungkan aliran tenaga dari mesin ke transmisi saat mobil sedang dalam kecepatan rendah.<br>3. Menstabilkan gerakan mobil ketika pengemudi mengganti gigi atau mengoperasikan kopling.<br>4. Mencegah mesin mati saat mobil berhenti atau gigi dalam posisi terkunci.</p><p><br></p><p><br></p><p><strong><span style="font-size: 24.0px;">Kapan Ganti Kampas Kopling Mobil?</span></strong></p><p><br></p><p>Kampas kopling mobil sebaiknya diganti setelah mencapai batas usia pakai yang sudah ditentukan oleh pabrik mobil. Namun, penggantian kampas kopling mobil juga dapat dilakukan jika pengemudi merasakan beberapa gejala yang mengindikasikan bahwa kampas kopling mobil sudah rusak atau habis.</p><p><br></p><p>Berikut adalah beberapa tanda-tanda kampas kopling mobil perlu diganti:</p><p><br></p><p>- Bau gosong pada area kampas kopling mobil akibat terlalu sering digunakan atau kampas kopling habis.<br>- Suara berdecit saat menginjak pedal kopling.<br>- Mobil tidak bisa bergerak atau kesulitan untuk berjalan di jalan yang menanjak.<br>- Gigi mobil sulit masuk atau mudah keluar sendiri.<br>- Pedal kopling terasa berat atau tidak responsif.<br>- Kampas kopling mobil sudah mencapai batas usia pakai yang ditentukan.</p><p><br></p><p><br></p><p><strong><span style="font-size: 24.0px;">Biaya Ganti Kampas Kopling Mobil</span></strong></p><p><br></p><p>Biaya penggantian kampas kopling mobil bisa berbeda-beda tergantung jenis mobil dan bengkel yang digunakan. Berikut adalah penjelasan tentang harga kampas kopling mobil dan faktor-faktor yang mempengaruhi biayanya:</p><p><br></p><p>- Jenis Mobil: Biaya penggantian kampas kopling mobil bergantung pada jenis mobil yang dimiliki. Mobil dengan kampas kopling yang lebih besar dan lebih rumit seperti SUV atau mobil off-road umumnya memerlukan biaya yang lebih tinggi dibandingkan mobil-mobil kecil.</p><p><br></p><p>- Merek Mobil: Merek mobil juga mempengaruhi biaya penggantian kampas kopling mobil. Pergantian kampas untuk &nbsp;mobil Hyundai tentu berbeda dengan merek lainnya.</p><p><br></p><p>- Kondisi Kampas Kopling: Biaya penggantian kampas kopling mobil juga dipengaruhi oleh kondisi kampas kopling yang lama. Jika kondisi kampas kopling sudah sangat parah, maka biaya penggantian juga akan semakin tinggi.</p><p><br></p><p>- Bengkel Mobil: Biaya penggantian kampas kopling mobil juga dipengaruhi oleh bengkel yang digunakan. Bengkel resmi atau authorized dealer umumnya memerlukan biaya yang lebih tinggi dibandingkan bengkel independen.</p><p><br></p><p>Dari faktor-faktor tersebut, biaya penggantian kampas kopling mobil bisa berkisar antara ratusan ribu hingga puluhan juta rupiah. Namun, sebaiknya tidak mengabaikan kondisi kampas kopling yang sudah rusak karena hal tersebut dapat mengancam keselamatan pengendara dan penumpang.</p><p><br></p><p><br></p><p><strong><span style="font-size: 24.0px;">Efek Setelah Ganti Kampas Kopling Mobil</span></strong></p><p><br></p><p>Mengganti kampas kopling mobil yang sudah rusak tentunya akan memberikan banyak manfaat dan efek positif. Berikut adalah beberapa efek yang bisa dirasakan setelah mengganti kampas kopling mobil:</p><p><br></p><p><strong>1. Peningkatan Performa Mobil</strong></p><p><br></p><p>Setelah mengganti kampas kopling mobil, kinerja kopling mobil akan menjadi lebih baik. Kampas kopling yang baru akan memberikan cengkeraman yang lebih baik pada <em>flywheel </em>mobil, sehingga perpindahan gigi akan lebih mulus dan responsif. Anda akan merasakan mobil lebih nyaman dan mudah dikendalikan.</p><p><br></p><p><strong>2. Mengurangi Konsumsi Bahan Bakar</strong></p><p><br></p><p>Kampas kopling yang habis atau aus dapat menyebabkan mobil menjadi lebih boros bahan bakar. Hal ini dikarenakan kampas kopling yang habis atau aus dapat menyebabkan slip yang berkepanjangan sehingga menyebabkan kerugian energi dan meningkatkan konsumsi bahan bakar. Setelah mengganti kampas kopling mobil, mobil akan lebih efisien dalam mengkonsumsi bahan bakar.</p><p><br></p><p><strong>3. Pengoperasian Mobil Lebih Halus</strong></p><p><br></p><p>Kampas kopling yang aus dapat menyebabkan mobil terasa lebih bergetar dan tidak nyaman saat mengoperasikan kopling. Setelah mengganti kampas kopling mobil, mobil akan terasa lebih halus saat pengoperasiannya. Anda tidak perlu khawatir lagi dengan getaran yang mengganggu kenyamanan berkendara.</p><p><br></p><p><strong>4. Meningkatkan Kenyamanan Berkendara</strong></p><p><br></p><p>Kampas kopling mobil yang sudah rusak juga dapat membuat pengendara merasa tidak nyaman saat berkendara. Setelah mengganti kampas kopling mobil, kenyamanan berkendara akan meningkat dan pengendara bisa lebih fokus pada jalanan.</p><p><br></p><p><strong>5. Kampas Kopling Tahan Lebih Lama</strong></p><p><br></p><p>Mengganti kampas kopling mobil yang sudah habis atau aus akan memperpanjang umur pakai kampas kopling mobil. Dengan kampas kopling yang baru, Anda dapat memperoleh keamanan dan kenyamanan dalam berkendara selama lebih lama.<a href="https://www.hyundai.com/id/id/find-a-car/stargazer/highlights#none"></a></p><p><br></p><p><span style="color: rgb(0,0,0);"><a href="https://www.hyundai.com/id/id/find-a-car/stargazer/highlights#none"><strong>Hyundai Stargazer</strong></a><strong>&nbsp;</strong></span>adalah salah satu mobil keluarga yang dilengkapi dengan mesin berkapasitas 2.400 cc dan transmisi manual 6-percepatan yang membuat mobil ini memiliki akselerasi yang responsif. Salah satu komponen penting yang harus diperhatikan pada Hyundai Stargazer adalah kampas kopling mobil. Kampas kopling yang aus atau habis akan membuat mobil menjadi tidak nyaman dan menurunkan performa mobil.</p><p><br></p><p>Jika Anda merasakan gejala kampas kopling mobil aus atau habis pada Hyundai Stargazer Anda, segeralah membawanya ke bengkel resmi Hyundai untuk mengganti kampas kopling mobil. Biaya penggantian kampas kopling mobil pada Hyundai Stargazer dapat berbeda tergantung suku cadang yang digunakan. Namun, pastikan Anda menggunakan suku cadang asli Hyundai untuk menjaga kualitas dan keamanan mobil Anda.</p><p><br></p><p>Dalam mengganti kampas kopling mobil Hyundai Stargazer, pastikan juga untuk melakukan pengecekan terhadap beberapa komponen pendukung lainnya seperti rem, kopling, dan transmisi untuk memastikan mobil Anda dalam kondisi yang baik dan aman untuk digunakan.</p>
                <p></p>
            </div>',
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

        DB::table('sales')->insert([
            'uuid' => Uuid::uuid4(),
            'img_url' => 'default-avatar.png',
            'name' => 'Ahmad Ali Husain',
            'description' => 'Toyota Yaris Cross adalah SUV mungil yang menawarkan perpaduan sempurna antara kepraktisan, gaya, dan performa. Diluncurkan di Indonesia pada tahun 2021, Yaris Cross langsung menarik perhatian dengan desainnya yang sporty dan modern, serta kabin yang lapang dan nyaman.',
            'phone_number' => '085667894012',
            'leads' => 0,
        ]);

        DB::table('sales')->insert([
            'uuid' => Uuid::uuid4(),
            'img_url' => 'default-avatar.png',
            'name' => 'Ahmad Wibowo',
            'description' => 'Toyota Yaris Cross adalah SUV mungil yang menawarkan perpaduan sempurna antara kepraktisan, gaya, dan performa. Diluncurkan di Indonesia pada tahun 2021, Yaris Cross langsung menarik perhatian dengan desainnya yang sporty dan modern, serta kabin yang lapang dan nyaman.',
            'phone_number' => '085667894012',
            'leads' => 0,
        ]);

        DB::table('sales')->insert([
            'uuid' => Uuid::uuid4(),
            'img_url' => 'default-avatar.png',
            'name' => 'Dimas Permana',
            'description' => 'Toyota Yaris Cross adalah SUV mungil yang menawarkan perpaduan sempurna antara kepraktisan, gaya, dan performa. Diluncurkan di Indonesia pada tahun 2021, Yaris Cross langsung menarik perhatian dengan desainnya yang sporty dan modern, serta kabin yang lapang dan nyaman.',
            'phone_number' => '085667894012',
            'leads' => 0,
        ]);

        DB::table('person_in_charges')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'David',
            'phone_number' => '085749328009',
            'sector' => 'BOOK_SERVICE',
        ]);

        DB::table('person_in_charges')->insert([
            'uuid' => Uuid::uuid4(),
            'name' => 'Jalal',
            'phone_number' => '08574932812',
            'sector' => 'ICE_CREAM',
        ]);

        DB::table('promos')->insert([
            'uuid' => Uuid::uuid4(),
            'img_url' => 'promo.jpg',
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
