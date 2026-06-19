<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // ✅ WAJIB

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contacts')->updateOrInsert(['id' => 1], [
            'email' => 'cartieraindonesia@gmail.com',
            'phone' => '0821 3060 9314',
            'address' => 'Ruko Rodeo Blok C No. 8-9, Gading Serpong, Tangerang',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
