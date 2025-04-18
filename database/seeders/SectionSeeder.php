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
            'description' => '<p>Lorem ipsum dolor sit amet <strong>consectetur</strong> adipisicing elit. Iste ea provident ducimus eum enim eveniet, placeat natus tenetur, quod accusantium maxime adipisci amet accusamus sit ullam asperiores ab, assumenda sapiente? Facere ipsam fuga tempora! Cumque dolor, excepturi beatae quos veritatis mollitia corrupti! Aliquid illo sequi aperiam ex at repellendus repudiandae quasi, enim doloribus cum delectus neque voluptas. Officia, amet reprehenderit.</p><p>&nbsp;</p><p>Vero <strong>dolores fugit</strong> laboriosam quia ipsa quisquam, voluptate, quod natus exercitationem autem, at perferendis explicabo ut. Magnam cum tenetur incidunt. Ducimus repellendus commodi molestiae libero, vitae totam. Sed, minus dolore! Vero dolores fugit laboriosam quia ipsa quisquam, voluptate, quod natus exercitationem autem, at perferendis explicabo ut. Magnam cum tenetur incidunt. Ducimus repellendus commodi molestiae libero, vitae totam. Sed, minus dolore. <i>asdsa</i></p><p>&nbsp;</p><ol><li>sadas</li><li>asdsad</li></ol>',
            'section_name' => 'sejarah'
        ]);

        // Tim Manajemen
        Section::create([
            'title' => 'Tim Manajemen Kami',
            'description' => 'Kami adalah tim yang berdedikasi untuk memberikan produk berkualitas tinggi dengan standar layanan terbaik untuk kepuasan pelanggan.',
            'section_name' => 'tim-hero'
        ]);

        // Produk
        Section::create([
            'title' => 'Produk Kami',
            'description' => 'Tembakau premium kami diperkaya dengan perpaduan rempah-rempah nusantara yang memikat. Setiap hisapan menghadirkan sensasi cengkeh pilihan yang menghangatkan, aroma kayu manis yang menenangkan, dan sentuhan kapulaga yang menyegarkan. Diproses dengan kearifan tradisional dan teknologi modern, menciptakan harmoni rasa yang memanjakan para penikmat rokok premium sejati.',
            'section_name' => 'produk-hero'
        ]);
    }
}
