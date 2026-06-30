<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FashionCollection extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_fashion',
        'gambar',
        'nama_item',
        'ukuran',
        'warna',
        'brand',
    ];
}
