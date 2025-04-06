<?php

namespace App\Livewire;

use Livewire\Component;

class SejarahVisiMisi extends Component
{
    public $misi = [];


    public function addMisi()
    {
        $this->misi[] = '';
    }

    public function removeMisi($index)
    {
        unset($this->misi[$index]);
        $this->misi = array_values($this->misi);
    }

    public function save()
    {
        dd('oke');
    }

    public function render()
    {
        return view('livewire.sejarah-visi-misi');
    }
}
