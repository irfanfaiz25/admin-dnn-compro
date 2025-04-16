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
            'title' => 'Visi & Misi',
            'subtitle' => 'Tujukan kami adalah memberikan solusi terbaik untuk memenuhi kebutuhan pelanggan dengan produk berkualitas tinggi dan layanan yang terjangkau',
            'section_name' => 'sejarah-visi-misi'
        ]);

        Headline::create([
            'title' => 'Pencapaian Kami',
            'subtitle' => 'Setiap pencapaian kami merupakan bukti nyata dari komitmen untuk memberikan yang terbaik. Didukung oleh tim profesional yang berdedikasi dan kepercayaan pelanggan yang terus bertumbuh bersama kami',
            'section_name' => 'tim-achievement'
        ]);

        Headline::create([
            'title' => 'Jaringan Cabang Kami',
            'subtitle' => 'Kami terus memperluas jangkauan untuk melayani pelanggan di berbagai wilayah dengan standar kualitas yang sama di setiap cabang',
            'section_name' => 'tim-branches'
        ]);

        Headline::create([
            'title' => 'Kami Bangga',
            'subtitle' => 'Kisah inspiratif dan pengalaman berharga dari para talenta terbaik yang telah berkembang bersama dalam membangun kesuksesan perusahaan',
            'section_name' => 'tim-testimonial'
        ]);

        Headline::create([
            'title' => 'Produk Kami',
            'subtitle' => 'Temukan koleksi produk premium kami yang dihadirkan dengan standar kualitas terbaik dan inovasi tanpa henti',
            'section_name' => 'produk-display'
        ]);

        Headline::create([
            'title' => 'Bangun Kesuksesan Bersama Kami',
            'subtitle' => 'Wujudkan visi anda menjadi realita',
            'section_name' => 'kontak-main'
        ]);
    }
}
