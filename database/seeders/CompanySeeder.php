<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->updateOrInsert(['id' => 1], [
            'name' => 'PT Cartiera Indonesia',
            'description' => 'Cartiera adalah brand fashion lokal yang menghadirkan menswear modern, minimalis, dan elegan dengan fokus pada kualitas material, detail desain, serta kenyamanan.',
            'address' => 'Ruko Rodeo Blok C No. 8-9, Gading Serpong, Tangerang, Banten',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
