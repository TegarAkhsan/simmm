<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi ke Paket (Package) - 1 Ruangan bisa punya banyak Paket
    public function packages()
    {
        return $this->hasMany(Package::class);
    }
}
