<?php

namespace Database\Seeders;

use App\Models\Achievement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Achievement::create([
            'icon' => 'fa-solid fa-building-flag',
            'count' => '7',
            'label' => 'Cabang',
            'color' => 'bg-primary-gold',
            'iconColor' => 'text-amber-700',
        ]);

        Achievement::create([
            'icon' => 'fa-solid fa-users',
            'count' => '350',
            'label' => 'Karyawan',
            'color' => 'bg-secondary-green',
            'iconColor' => 'text-green-200',
        ]);

        Achievement::create([
            'icon' => 'fa-solid fa-users-line',
            'count' => '1200',
            'label' => 'Customer',
            'color' => 'bg-tertiary-red',
            'iconColor' => 'text-red-200',
        ]);
    }
}
