<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReservasi extends Model
{
    use HasFactory;
    protected $table = "detail_reservasis";
    public function reservasis()
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function mejas()
    {
        return $this->belongsTo(Meja::class);
    }

    public function haris()
    {
        return $this->belongsTo(Hari::class);
    }

    public function jams()
    {
        return $this->belongsTo(Jam::class);
    }
}
