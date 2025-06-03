<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');             // Jenis Paket
            $table->string('price');                     // harga
            $table->string('background')->nullable();  // Background (dipisah koma)
            $table->string('location')->nullable();     // Lokasi (jika ada)
            $table->text('description')->nullable();    // Deskripsi lengkap
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('packages');
    }
};
