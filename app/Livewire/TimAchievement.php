<?php

namespace App\Livewire;

use Livewire\Component;

class TimAchievement extends Component
{
    public $stats = [
        [
            'icon' => 'fa-solid fa-building-flag',
            'count' => '7',
            'label' => 'Cabang',
            'color' => 'bg-primary-gold',
            'iconColor' => 'text-amber-700',
            'delay' => 0.2
        ],
        [
            'icon' => 'fa-solid fa-users',
            'count' => '350',
            'label' => 'Karyawan',
            'color' => 'bg-secondary-green',
            'iconColor' => 'text-green-200',
            'delay' => 0.4
        ],
        [
            'icon' => 'fa-solid fa-users-line',
            'count' => '1200',
            'label' => 'Customer',
            'color' => 'bg-tertiary-red',
            'iconColor' => 'text-red-200',
            'delay' => 0.6
        ]
    ];

    public function render()
    {
        return view('livewire.tim-achievement');
    }
}
