<?php

namespace Database\Seeders;

use App\Models\Misi;
use App\Models\Visi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisiMisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visi::create([
            'content' => 'Menjadi perusahaan perdagangan terkemuka di Indonesia yang diakui secara nasional dan internasional, dengan memberikan nilai tambah berkelanjutan bagi seluruh pemangku kepentingan melalui praktik bisnis yang inovatif dan bertanggung jawab.',
        ]);

        Misi::create([
            'content' => 'Mengembangkan jaringan perdagangan yang kuat dan berkelanjutan di seluruh Indonesia.',
            'order_number' => 1,
        ]);

        Misi::create([
            'content' => 'Memberikan layanan prima dan solusi inovatif kepada seluruh mitra bisnis.',
            'order_number' => 2,
        ]);

        Misi::create([
            'content' => 'Membangun sumber daya manusia yang unggul dan profesional.',
            'order_number' => 3,
        ]);

        Misi::create([
            'content' => 'Menerapkan praktik bisnis yang etis dan berkelanjutan.',
            'order_number' => 4,
        ]);
    }
}
