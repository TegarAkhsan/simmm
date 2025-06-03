<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::create([
            'user_id' => 1,
            'package_id' => 2,
            'room_id' => 1,
            'booking_datetime' => Carbon::parse('2025-06-10 14:00'),
            'status' => 'success',
        ]);
    }
}
