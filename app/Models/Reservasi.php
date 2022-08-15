<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;
    protected $table = "reservasis";
    // protected $primaryKey = ['id_menu'];
    // protected $guarded = [];
    protected $fillable = [
        'nama_pelanggan',
        'no_rekening',
        'bukti_transfer',
        'tgl_pesan'
    ];
    protected $dates = ['created_at'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
