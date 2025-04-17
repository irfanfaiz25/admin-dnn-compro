<?php

namespace App\Livewire;

use Livewire\Component;

class TimBranches extends Component
{
    public $isShowHeadlineForm = false;
    public $branches = [
        [
            'city' => 'Boyolali',
            'region' => 'Jawa Tengah',
            'established' => 'November 2024',
            'address' => 'Jl. Raya Boyolali No. 123'
        ],
        [
            'city' => 'Sukoharjo',
            'region' => 'Jawa Tengah',
            'established' => 'Desember 2024',
            'address' => 'Jl. Raya Boyolali No. 123'
        ],
        [
            'city' => 'Karanganyar',
            'region' => 'Jawa Tengah',
            'established' => 'Januari 2025',
            'address' => 'Jl. Raya Boyolali No. 123'
        ],
        [
            'city' => 'Wonogiri',
            'region' => 'Jawa Tengah',
            'established' => 'Januari 2025',
            'address' => 'Jl. Raya Boyolali No. 123'
        ],
        [
            'city' => 'Ponorogo',
            'region' => 'Jawa Timur',
            'established' => 'Februari 2025',
            'address' => 'Jl. Raya Boyolali No. 123'
        ],
        [
            'city' => 'Cirebon',
            'region' => 'Jawa Barat',
            'established' => 'April 2025',
            'address' => 'Jl. Raya Boyolali No. 123'
        ],
        [
            'city' => 'Yogyakarta',
            'region' => 'DIY',
            'established' => 'April 2025',
            'address' => 'Jl. Raya Boyolali No. 123'
        ]
    ];

    public function render()
    {
        return view('livewire.tim-branches');
    }
}
