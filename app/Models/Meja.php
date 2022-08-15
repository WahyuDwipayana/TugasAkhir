<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = "meja";
    // protected $primaryKey = ['id_menu'];
    // protected $guarded = [];
    protected $fillable = [
        'no_meja',
        'gambar_meja'
    ];
    protected $dates = ['created_at'];

    // // Relation
    // public function detail_reservasi()
    // {
    //     return $this->hasOne(Waktu::class);
    // }
}
