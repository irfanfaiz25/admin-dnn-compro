<?php

namespace Database\Seeders;

use App\Models\Branch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Branch::create([
            'city' => 'Boyolali',
            'region' => 'Jawa Tengah',
            'established' => '2024-11',
            'address' => 'Jl. Raya Boyolali No. 123'
        ]);

        Branch::create([
            'city' => 'Sukoharjo',
            'region' => 'Jawa Tengah',
            'established' => '2024-12',
            'address' => 'Jl. Raya Sukoharjo No. 123'
        ]);

        Branch::create([
            'city' => 'Karanganyar',
            'region' => 'Jawa Tengah',
            'established' => '2025-01',
            'address' => 'Jl. Raya Karanganyar No. 123'
        ]);

        Branch::create([
            'city' => 'Wonogiri',
            'region' => 'Jawa Tengah',
            'established' => '2025-02',
            'address' => 'Jl. Raya Wonogiri No. 123'
        ]);

        Branch::create([
            'city' => 'Ponorogo',
            'region' => 'Jawa Timur',
            'established' => '2025-03',
            'address' => 'Jl. Raya Ponorogo No. 123'
        ]);

        Branch::create([
            'city' => 'Cirebon',
            'region' => 'Jawa Barat',
            'established' => '2025-04',
            'address' => 'Jl. Raya Cirebon No. 123'
        ]);

        Branch::create([
            'city' => 'Yogyakarta',
            'region' => 'Daerah Istimewa Yogyakarta',
            'established' => '2025-04',
            'address' => 'Jl. Raya Yogyakarta No. 123'
        ]);
    }
}
