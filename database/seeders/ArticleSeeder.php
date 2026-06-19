<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $articles = [
            ['title' => 'Cara Memadukan Polo Shirt untuk Gaya Smart Casual', 'content' => 'Polo shirt menjadi pilihan serbaguna untuk tampilan smart casual. Padukan warna netral dengan chino berpotongan rapi, lalu gunakan sepatu loafers atau sneakers minimalis untuk menjaga kesan modern dan nyaman.', 'image' => 'images/km1.png'],
            ['title' => 'Mengapa Material Berkualitas Menentukan Kenyamanan', 'content' => 'Kualitas material memengaruhi sirkulasi udara, daya tahan, dan bentuk pakaian setelah digunakan. Cartiera memilih material yang nyaman agar setiap koleksi tetap terasa ringan dan terlihat rapi sepanjang hari.', 'image' => 'images/Secondary-black.png'],
            ['title' => 'Mengenal Gaya Minimalis Pria Modern', 'content' => 'Gaya minimalis mengutamakan siluet bersih, warna yang mudah dipadukan, dan detail fungsional. Dengan pilihan item yang tepat, lemari pakaian menjadi lebih efisien tanpa kehilangan karakter personal.', 'image' => 'images/km2.png'],
        ];

        foreach ($articles as $article) {
            Article::updateOrCreate(['title' => $article['title']], $article);
        }
    }
}
