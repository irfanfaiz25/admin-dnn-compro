<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class SejarahDescription extends Component
{
    use WithFileUploads;

    public $content;
    public $image;

    public function save()
    {
        dd($this->content);
    }

    public function render()
    {
        return view('livewire.sejarah-description');
    }
}
