<?php

namespace App\Livewire;

use App\Models\Section;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class BerandaAbout extends Component
{
    use WithFileUploads;

    public $isShowForm = false;
    public $image;
    public $existingImage;
    public $aboutContent = '';
    public $aboutTitle = '';
    public $aboutDescription = '';


    public function handleOpenForm()
    {
        $this->isShowForm = true;
        $section = Section::where('section_name', 'beranda-about')->first();
        if ($section) {
            $this->existingImage = $section->image_url;
            $this->aboutContent = $section->content;
            $this->aboutTitle = $section->title;
            $this->aboutDescription = $section->description;
            return;
        }

        Toaster::error('Data tidak ditemukan');
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->image = null;
        $this->existingImage = null;
        $this->aboutContent = '';
        $this->aboutTitle = '';
        $this->aboutDescription = '';
    }

    public function handleSave()
    {
        $section = Section::where('section_name', 'beranda-about')->first();
        if (!$section) {
            Toaster::error('Data tidak ditemukan');
            return;
        }

        $validationRules = [
            'aboutContent' => [
                'required' => 'Konten harus diisi',
                'string' => 'Konten harus berupa teks',
                'max:255' => 'Konten tidak boleh lebih dari 255 karakter'
            ],
            'aboutTitle' => [
                'required' => 'Judul harus diisi',
                'string' => 'Judul harus berupa teks',
                'max:100' => 'Judul tidak boleh lebih dari 100 karakter'
            ],
            'aboutDescription' => [
                'required' => 'Deskripsi harus diisi',
                'string' => 'Deskripsi harus berupa teks',
                'max:255' => 'Deskripsi tidak boleh lebih dari 255 karakter'
            ]
        ];

        $imageRules = [];
        if ($this->existingImage) {
            if ($this->image) {
                $imageRules['image'] = [
                    'mimes:jpg,jpeg,png' => 'Format gambar harus jpg, jpeg, atau png',
                    'max:2048' => 'Ukuran gambar tidak boleh lebih dari 2MB'
                ];
            }
        } else {
            $imageRules['image'] = [
                'required' => 'Gambar harus diisi',
                'mimes:jpg,jpeg,png' => 'Format gambar harus jpg, jpeg, atau png',
                'max:2048' => 'Ukuran gambar tidak boleh lebih dari 2MB'
            ];
        }

        $validationRules = array_merge($validationRules, $imageRules);

        $this->validate($validationRules);

        $imageUrl = $this->existingImage;
        if ($this->image) {
            // Generate timestamp for unique filename
            $timestamp = time();
            $filename = 'beranda-about-' . $timestamp . '.' . $this->image->getClientOriginalExtension();

            // If new image is uploaded, store it with timestamped name and update URL
            $imageUrl = 'storage/' . $this->image->storeAs('img/sections', $filename, 'public');

            // Delete old image if exists
            if (
                $section->image_url &&
                Storage::disk('public')->exists(str_replace('storage/', '', $section->image_url))
            ) {
                Storage::disk('public')->delete(str_replace('storage/', '', $section->image_url));
            }
        }

        $section->update([
            'title' => $this->aboutTitle,
            'description' => $this->aboutDescription,
            'content' => $this->aboutContent,
            'image_url' => $imageUrl,
        ]);

        $this->handleCloseForm();
        Toaster::success('Data berhasil di perbarui');
    }

    public function render()
    {
        $section = Section::where('section_name', 'beranda-about')->first();
        return view('livewire.beranda-about', [
            'section' => $section,
        ]);
    }
}
