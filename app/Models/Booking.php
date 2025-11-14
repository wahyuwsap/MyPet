<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'pet_name',
        'service_id',
        'booking_date',
        'booking_time',
        'notes',
    ];

    /**
     * Relasi ke user yang melakukan booking
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke layanan
     */
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}

