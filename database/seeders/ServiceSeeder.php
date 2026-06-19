<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['name' => 'Essential Polo Collection', 'description' => 'Polo shirt premium dengan siluet modern, material nyaman, dan warna serbaguna untuk aktivitas formal maupun kasual.', 'image' => 'images/km1.png'],
            ['name' => 'Modern Koko Collection', 'description' => 'Koleksi koko berkarakter minimalis dengan detail elegan untuk tampilan rapi pada berbagai momen spesial.', 'image' => 'images/km2.png'],
            ['name' => 'Fashion Consultation', 'description' => 'Layanan konsultasi pemilihan produk dan padu padan gaya yang sesuai dengan kebutuhan serta karakter pelanggan.', 'image' => 'images/Secondary-black.png'],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['name' => $service['name']], $service);
        }
    }
}
