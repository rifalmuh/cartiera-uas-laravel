<?php

namespace Database\Seeders;

use App\Models\FashionCollection;
use Illuminate\Database\Seeder;

class FashionCollectionSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'id_fashion' => 'FSH-001',
                'gambar' => 'images/fashion/fsh-001-urban-work-jacket.png',
                'nama_item' => 'Cartiera Urban 2in1 Work Jacket Dan Kemeja Pria Lengan Pendek Jaket Boxy Pria Full Zipper YKK',
                'ukuran' => 'S, M, L, XL, XXL',
                'warna' => 'Pendek - Black, Panjang - Black',
                'brand' => 'Cartiera',
            ],
            [
                'id_fashion' => 'FSH-002',
                'gambar' => 'images/fashion/fsh-002-flex-polo-half-zipper.png',
                'nama_item' => 'Cartiera Flex Polo Shirt Pria Half Zipper 280 GSM Baju Polo Kaos Kerah Pria Lengan Pendek Anti Kusut Stretchy Adem',
                'ukuran' => 'S, M, L, XL, XXL',
                'warna' => 'Pria - Black, Pria - Brown, Pria - White, Wanita - Black',
                'brand' => 'Cartiera',
            ],
            [
                'id_fashion' => 'FSH-003',
                'gambar' => 'images/fashion/fsh-003-flo-polo-shirt.png',
                'nama_item' => 'Cartiera FLO Polo Shirt Pria Kaos Kerah Pria Lengan Pendek Lentur Adem Tidak Transparan',
                'ukuran' => 'S, M, L, XL, XXL',
                'warna' => 'Jet Black',
                'brand' => 'Cartiera',
            ],
            [
                'id_fashion' => 'FSH-004',
                'gambar' => 'images/fashion/fsh-004-danke-chinos.png',
                'nama_item' => 'Cartiera Danke Celana Chinos Panjang Pria Straight Fit Anti UV 2 Way Stretch',
                'ukuran' => '28, 30, 32, 34, 36',
                'warna' => 'Black, Grey, Cream, Olive',
                'brand' => 'Cartiera',
            ],
            [
                'id_fashion' => 'FSH-005',
                'gambar' => 'images/fashion/fsh-005-everyday-pants.png',
                'nama_item' => 'Cartiera Everyday Pants Celana Panjang Pria Celana Formal Dan Casual Tapered Fit Anti UV 4 Way Stretch Premium',
                'ukuran' => '28, 30, 32, 34, 36',
                'warna' => 'Black, Cream, Grey, Olive',
                'brand' => 'Cartiera',
            ],
            [
                'id_fashion' => 'FSH-006',
                'gambar' => 'images/fashion/fsh-006-loco-polo-scuba.png',
                'nama_item' => 'Loco Polo Cartiera Scuba 280 GSM Oversize Polo Shirt Pria / Kaos Kerah Lengan Pendek',
                'ukuran' => 'S, M, L, XL, XXL',
                'warna' => 'Jet Black, Brown, White, Grey, Maroon',
                'brand' => 'Cartiera',
            ],
        ];

        foreach ($items as $item) {
            FashionCollection::updateOrCreate(
                ['id_fashion' => $item['id_fashion']],
                $item
            );
        }
    }
}
