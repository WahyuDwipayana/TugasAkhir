<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailMenu extends Model
{
    use HasFactory;
    protected $table = "detail_menus";
    
    public function reservasis()
    {
        return $this->belongsTo(Reservasi::class);
    }    
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }    
}
