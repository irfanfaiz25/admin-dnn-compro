<?php

namespace App\Livewire;

use Livewire\Component;

class SidebarToggle extends Component
{
    public $isSidebarVisible = false;
    public $sidebarMenu = [
        [
            'name' => 'dashboard',
            'route' => 'dashboard',
            'icon' => 'fa-solid fa-house',
            'request' => 'dashboard*'
        ],
        [
            'name' => 'beranda',
            'route' => 'dashboard',
            'icon' => 'fa-solid fa-layer-group',
            'request' => 'beranda*'
        ],
        [
            'name' => 'data master',
            'route' => 'dashboard',
            'icon' => 'fa-solid fa-layer-group',
            'request' => 'products*',
            'children' => [
                [
                    'name' => 'produk',
                    'route' => 'dashboard',
                    'icon' => 'fa-solid fa-rectangle-list',
                    'request' => 'products/data*',
                ],
                [
                    'name' => 'manajemen stok',
                    'route' => 'dashboard',
                    'icon' => 'fa-solid fa-stopwatch-20',
                    'request' => 'products/stock*',
                ],
            ],
        ],
    ];

    public function toggleSidebar()
    {
        $this->isSidebarVisible = !$this->isSidebarVisible;
    }

    public function render()
    {
        return view('livewire.sidebar-toggle');
    }
}
