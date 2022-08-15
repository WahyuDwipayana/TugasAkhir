<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hari extends Model
{
    use HasFactory;
    protected $table = "haris";
    // protected $primaryKey = ['id_menu'];
    // protected $guarded = [];
    protected $fillable = [
        'nama_hari'
    ];
    protected $dates = ['created_at'];


    // public function jams()
    // {
    //     return $this->hasMany(Jam::class);
    // }
}
