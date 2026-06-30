<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fashion_collections', function (Blueprint $table) {
            $table->id();
            $table->string('id_fashion')->unique();
            $table->string('gambar')->nullable();
            $table->string('nama_item');
            $table->string('ukuran', 40);
            $table->string('warna', 80);
            $table->string('brand', 120);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fashion_collections');
    }
};
