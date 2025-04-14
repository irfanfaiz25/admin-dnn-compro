<?php

namespace App\Livewire;

use Livewire\Component;

class SidebarToggle extends Component
{
    public $isSidebarVisible = false;
    public $sidebarMenu = [
        [
            'name' => 'dashboard',
            'route' => 'dashboard.index',
            'icon' => 'fa-solid fa-house',
            'request' => 'dashboard*'
        ],
        [
            'name' => 'beranda',
            'route' => 'beranda.index',
            'icon' => 'fa-solid fa-layer-group',
            'request' => 'beranda*'
        ],
        [
            'name' => 'tentang kami',
            'route' => '',
            'icon' => 'fa-solid fa-layer-group',
            'request' => 'tentang*',
            'children' => [
                [
                    'name' => 'sejarah',
                    'route' => 'sejarah.index',
                    'icon' => 'fa-solid fa-rectangle-list',
                    'request' => 'tentang/sejarah*',
                ],
                [
                    'name' => 'tim manajemen',
                    'route' => 'tim-manajemen.index',
                    'icon' => 'fa-solid fa-stopwatch-20',
                    'request' => 'tentang/tim-manajemen*',
                ],
            ],
        ],
        [
            'name' => 'produk',
            'route' => 'produk.index',
            'icon' => 'fa-solid fa-layer-group',
            'request' => 'produk*'
        ],
        [
            'name' => 'kontak',
            'route' => 'kontak.index',
            'icon' => 'fa-solid fa-layer-group',
            'request' => 'kontak*'
        ],
        [
            'name' => 'revolusi rasa',
            'route' => 'revolusi.index',
            'icon' => 'fa-solid fa-layer-group',
            'request' => 'revolusi*'
        ],
        [
            'name' => 'informasi',
            'route' => 'informasi.index',
            'icon' => 'fa-solid fa-layer-group',
            'request' => 'informasi*'
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
