<?php

namespace App\Livewire;

use Livewire\Component;

class TimHero extends Component
{
    public $manajemen = [
        [
            'id' => 1,
            'name' => 'Irwan Yunanto',
            'position' => 'Manajer Utama',
        ],
        [
            'id' => 2,
            'name' => 'Amirudin Zuhri',
            'position' => 'Wakil Manajer',
        ],
        [
            'id' => 3,
            'name' => 'Yoan Fauzia',
            'position' => 'Business Development',
        ],
    ];

    public function render()
    {
        return view('livewire.tim-hero');
    }
}
