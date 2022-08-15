<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = "categories";
    // protected $primaryKey = ['id_menu'];
    // protected $guarded = [];
    protected $fillable = [
        'nama_kategori'
    ];
    protected $dates = ['created_at'];
    
    // public function menu()
    // {
    //     return $this->hasMany(Menu::class);
    // }
}
