<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Kedhaton Nusantara',
            'series' => 'Premium Blend',
            'stock' => true,
            'description' => 'Kedhaton Nusantara merupakan manifestasi dari keanggunan cita rasa klasik yang dipadukan dengan sentuhan modernitas. Diproduksi secara eksklusif dengan tembakau pilihan dari lembah-lembah subur Nusantara, setiap batang merupakan hasil kurasi yang ketat dan proses pemeraman yang sempurna.',
            'racikan' => 'Tembakau Virginia & Oriental Premium',
            'karakter' => 'Sedang dan Lembut',
            'rempah' => 'Kayu Manis & Cengkeh',
            'kemasan' => 12,
            'detailImage' => 'images/products/detail/kedhaton-nusantara.jpg',
            'packImage' => 'images/products/pack/kedhaton-nusantara.jpg',
        ]);
    }
}
