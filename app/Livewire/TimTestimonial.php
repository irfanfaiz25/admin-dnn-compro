<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class TimTestimonial extends Component
{
    use WithFileUploads;

    public $testimonials = [
        [
            'name' => 'Bambang Setiawan',
            'position' => 'Bekerja sejak tahun 2007',
            'message' => 'Bangga bekerja dengan Nojoprino, perusahaan yang sangat menjunjung tinggi rasa kekeluargaan. Tercermin nyata dari hangat perhatian yang tercipta dari atasan maupun rekan kerja.',
            'image' => '/img/profil1.png',
            'date' => '15 Januari 2024'
        ],
        [
            'name' => 'Siti Rahayu',
            'position' => 'Bekerja sejak tahun 2010',
            'message' => 'Selama 14 tahun berkarir disini, saya merasakan pertumbuhan yang luar biasa. Perusahaan sangat mendukung pengembangan karyawan melalui berbagai program pelatihan.',
            'image' => '/img/profil1.png',
            'date' => '12 Januari 2024'
        ],
        [
            'name' => 'Ahmad Hidayat',
            'position' => 'Bekerja sejak tahun 2015',
            'message' => 'Lingkungan kerja yang profesional namun tetap hangat membuat saya betah. Sistem manajemen yang transparan dan adil membuat karyawan merasa dihargai.',
            'image' => '/img/profil1.png',
            'date' => '10 Januari 2024'
        ]
    ];

    public $image;

    public function render()
    {
        return view('livewire.tim-testimonial');
    }
}
