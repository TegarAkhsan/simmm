<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PackageSeeder extends Seeder
{
    public function run()
    {
        DB::table('packages')->insert([
            [
                'package_name' => 'Paket Eksklusif',
                'price' => 1500000,
                'background' => 'Biru, Merah, Kuning',
                'location' => 'Studio High-Class',
                'description' => 'Cocok untuk acara resmi dan profesional seperti seminar, konferensi, dan gala dinner. Ruangan dengan pencahayaan premium dan background elegan membuat setiap hasil foto tampak mewah.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Outdoor',
                'price' => 1200000,
                'background' => 'Hijau, Coklat, Sunset',
                'location' => 'Outdoor Spesial',
                'description' => 'Nikmati sesi foto di luar ruangan dengan latar alam yang asri dan natural. Paket ini ideal untuk pesta ulang tahun, pernikahan outdoor, dan gathering komunitas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Paket Premium',
                'price' => 2000000,
                'background' => 'Emas, Hitam, Silver',
                'location' => 'Studio VIP',
                'description' => 'Paket terbaik dengan konsep studio VIP, cocok untuk acara eksklusif dan personal seperti prewedding, anniversary, dan sesi foto keluarga. Dapatkan hasil foto dengan kualitas terbaik dan sentuhan artistik.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
