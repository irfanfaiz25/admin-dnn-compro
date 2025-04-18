<?php

namespace Database\Seeders;

use App\Models\TeamTestimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamTestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TeamTestimonial::create([
            'name' => 'Bambang Setiawan',
            'position' => '2007-11',
            'message' => 'Bangga bekerja dengan Nojoprino, perusahaan yang sangat menjunjung tinggi rasa kekeluargaan. Tercermin nyata dari hangat perhatian yang tercipta dari atasan maupun rekan kerja.',
        ]);

        TeamTestimonial::create([
            'name' => 'Siti Rahayu',
            'position' => '2010-12',
            'message' => 'Selama 14 tahun berkarir disini, saya merasakan pertumbuhan yang luar biasa. Perusahaan sangat mendukung pengembangan karyawan melalui berbagai program pelatihan.',
        ]);

        TeamTestimonial::create([
            'name' => 'Ahmad Hidayat',
            'position' => '2015-06',
            'message' => 'Lingkungan kerja yang profesional namun tetap hangat membuat saya betah. Sistem manajemen yang transparan dan adil membuat karyawan merasa dihargai.',
        ]);
    }
}
