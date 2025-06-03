<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'title' => 'Promo Spesial Lebaran',
            'start_date' => '2025-06-01',
            'end_date' => '2025-06-10',
            'description' => 'Dapatkan diskon 30% selama musim libur Lebaran!',
            'voucher_code' => 'LEBARAN30',
        ]);

        Event::create([
            'title' => 'Paket Couple Valentine',
            'start_date' => '2025-02-10',
            'end_date' => '2025-02-20',
            'description' => 'Paket couple + 2 cetakan gratis. Cocok untuk pasangan romantis!',
            'voucher_code' => 'LOVE2025',
        ]);
    }
}