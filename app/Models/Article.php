<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Field yang boleh diisi (WAJIB untuk seeder & create)
    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    // Optional: format tanggal otomatis (Laravel default sebenarnya sudah ada)
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
