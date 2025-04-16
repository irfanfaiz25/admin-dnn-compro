<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Beranda Hero
        Section::create([
            'title' => 'Bergerak Maju Menang',
            'description' => 'Melangkah dengan tekad kuat menuju kesuksesan',
            'section_name' => 'beranda-hero'
        ]);

        Section::create([
            'title' => 'Revolusi Rasa',
            'description' => 'Perpaduan sempurna antara tembakau piligan dan bahan-bahan berkualitas tinggi',
            'section_name' => 'beranda-hero'
        ]);

        // Beranda About
        Section::create([
            'title' => 'Komitmen Kami',
            'description' => 'Kami berkomitmen untuk memberikan pengalaman terbaik kepada pelanggan kami',
            'content' => 'Kami menawarkan berbagai pilihan tembakau yang unik dan berkualitas tinggi. Dari tembakau tradisional hingga pilihan modern, kami memiliki sesuatu untuk memenuhi selera setiap pelanggan',
            'section_name' => 'beranda-about'
        ]);

        // Beranda Product
        Section::create([
            'title' => 'Bahan Alami Berkualitas',
            'description' => 'Dipilih dari bahan berkualitas terbaik, diproses dengan standar mutu tinggi untuk menghasilkan produk premium',
            'section_name' => 'beranda-product'
        ]);

        Section::create([
            'title' => 'Cita Rasa Khas Nusantara',
            'description' => 'Memadukan resep tradisional dengan teknologi modern untuk menghadirkan pengalaman rasa yang tak tertandingi',
            'section_name' => 'beranda-product'
        ]);

        Section::create([
            'title' => 'Berbakti Untuk Nusantara',
            'description' => 'Terus berinovasi dalam mengembangkan produk untuk memberikan pengalaman terbaik bagi pelanggan',
            'section_name' => 'beranda-product'
        ]);

        // Sejarah
        Section::create([
            'title' => 'Sejarah Perusahaan',
            'description' => 'Kami berawal dari ide dan pengalaman, dan telah berkembang menjadi perusahaan yang sukses',
            'section_name' => 'sejarah'
        ]);
    }
}
