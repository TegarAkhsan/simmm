<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Memanggil seeders secara berurutan
        $this->call([
            // RoomSeeder::class,
            PackageSeeder::class,
            EventSeeder::class,
        ]);
    }
}