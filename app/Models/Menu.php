<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $table = "menu";
    // protected $primaryKey = ['id_menu'];
    // protected $guarded = [];
    protected $fillable = [
        'nama_menu', 
        'id_kategori', 
        'harga_menu', 
        'gambar_menu', 
        'desc_menu', 
        'status'
    ];
    protected $dates = ['created_at'];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'id_kategori');
    }    
}
