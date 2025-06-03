<?php

namespace App\Models;namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_id',
        'name',
        'email',
        'phone',
        'payment_method',
        'payment_option',
        'payment_address',
        'invoice_code',
        'expiry_time',
        'amount',
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
