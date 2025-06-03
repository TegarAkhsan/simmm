<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    // relasi ke Room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}