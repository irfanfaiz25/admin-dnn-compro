<?php

namespace Database\Seeders;

use App\Models\Headline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeadlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Headline::create([
            'title' => 'Pusaka Warisan Nusantara',
            'subtitle' => 'Menghadirkan pengalaman tembakau premium khas nusantara',
            'section_name' => 'beranda-product'
        ]);

        Headline::create([
            'title' => 'Tentang Revolusi Rasa',
            'subtitle' => 'Pengalaman Autentik dari Para Penikmat Nusantara',
            'section_name' => 'beranda-testimonial'
        ]);

        Headline::create([
            'title' => 'Visi & Misi',
            'subtitle' => 'Memberikan solusi terbaik dengan produk berkualitas dan layanan terjangkau',
            'section_name' => 'sejarah-visi-misi'
        ]);

        Headline::create([
            'title' => 'Pencapaian Kami',
            'subtitle' => 'Komitmen kami untuk memberikan yang terbaik didukung oleh tim profesional dan kepercayaan pelanggan',
            'section_name' => 'tim-achievement'
        ]);

        Headline::create([
            'title' => 'Jaringan Cabang Kami',
            'subtitle' => 'Melayani pelanggan di berbagai wilayah dengan standar kualitas terbaik',
            'section_name' => 'tim-branches'
        ]);

        Headline::create([
            'title' => 'Kami Bangga',
            'subtitle' => 'Kisah inspiratif dari talenta terbaik yang berkembang bersama kami',
            'section_name' => 'tim-testimonial'
        ]);

        Headline::create([
            'title' => 'Produk Kami',
            'subtitle' => 'Koleksi produk premium dengan kualitas terbaik',
            'section_name' => 'produk-display'
        ]);

        Headline::create([
            'title' => 'Bangun Kesuksesan Bersama Kami',
            'subtitle' => 'Wujudkan visi anda menjadi realita',
            'section_name' => 'kontak-main'
        ]);
    }
}
