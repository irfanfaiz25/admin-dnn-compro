<?php

namespace App\Livewire;

use App\Models\Misi;
use App\Models\Visi;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class SejarahVisiMisi extends Component
{
    public $isShowForm = false;
    public $formType = '';
    public $visi = '';
    public $misi = [];


    public function handleOpenForm($type)
    {
        $this->formType = $type;
        $this->isShowForm = true;
        $section = $type === 'visi' ? Visi::first() : Misi::orderBy('order_number')->get();

        if ($type === 'visi') {
            $this->visi = $section ? $section->content : '';
        } else {
            $this->misi = $section->pluck('content')->toArray();
        }
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->reset('visi', 'misi', 'formType');
    }

    public function addMisi()
    {
        $this->misi[] = '';
    }

    public function removeMisi($index)
    {
        unset($this->misi[$index]);
        $this->misi = array_values($this->misi);
    }

    public function handleSave()
    {
        if ($this->formType === 'visi') {
            $this->validate([
                'visi' => 'required|string',
            ], [
                'visi.required' => 'Visi tidak boleh kosong',
                'visi.string' => 'Visi harus berupa teks'
            ]);

            $visi = Visi::first();
            if (!$visi) {
                Visi::create([
                    'content' => $this->visi,
                ]);
            } else {
                $visi->update([
                    'content' => $this->visi,
                ]);
            }

        } else {
            $this->validate([
                'misi' => 'required|array|min:1',
                'misi.*' => 'required|string',
            ], [
                'misi.required' => 'Misi tidak boleh kosong',
                'misi.array' => 'Format misi tidak valid',
                'misi.min' => 'Minimal harus ada 1 misi',
                'misi.*.required' => 'Setiap misi tidak boleh kosong',
                'misi.*.string' => 'Setiap misi harus berupa teks'
            ]);

            Misi::truncate();

            foreach ($this->misi as $index => $misi) {
                Misi::create([
                    'content' => $misi,
                    'order_number' => $index + 1,
                ]);
            }
        }

        $message = $this->formType === 'visi' ? 'Visi berhasil di perbarui' : 'Misi berhasil di perbarui';
        Toaster::success($message);
        $this->handleCloseForm();
    }

    public function render()
    {
        $visi = Visi::first();
        $misi = Misi::orderBy('order_number')->get();

        return view('livewire.sejarah-visi-misi', [
            'visiData' => $visi,
            'misiData' => $misi,
        ]);
    }
}
