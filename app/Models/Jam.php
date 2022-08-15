<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jam extends Model
{
    use HasFactory;
    protected $table = "jams";
    protected $fillable = [
        'jam'
    ];

    protected $dates = ['created_at'];

    public function haris()
    {
        return $this->belongsTo(Hari::class);
    }
}
