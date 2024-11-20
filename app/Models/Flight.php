<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    protected $fillable = ['flight_code', 'origin', 'destination', 'departure_time', 'arrival_time'];

    protected $dates = ['departure_time', 'arrival_time'];

    protected $casts = [
        'departure_time' => 'datetime',
        'arrival_time' => 'datetime',
    ];

    // Relasi ke tiket (satu penerbangan(flight) bisa punya banyak tiket)
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
