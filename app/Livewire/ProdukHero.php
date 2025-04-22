<?php

namespace App\Livewire;

use App\Models\Section;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class ProdukHero extends Component
{
    use WithFileUploads;

    public $isShowForm = false;
    public $heroTitle = '';
    public $heroDescription = '';

    public $image;
    public $existingImage;


    public function handleOpenForm()
    {
        $section = Section::where('section_name', 'produk-hero')->first();
        if (!$section) {
            Toaster::error('Section tidak ditemukan');
            return;
        }

        $this->heroTitle = $section->title;
        $this->heroDescription = $section->description;
        $this->existingImage = $section->image_url;
        $this->isShowForm = true;
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->reset('heroTitle', 'heroDescription', 'image', 'existingImage');
    }

    public function handleSave()
    {
        $section = Section::where('section_name', 'produk-hero')->first();
        if (!$section) {
            Toaster::error('Section tidak ditemukan');
            return;
        }

        $customMessages = [
            'heroTitle.required' => 'Judul hero wajib diisi',
            'heroTitle.string' => 'Judul hero harus berupa teks',
            'heroTitle.max' => 'Judul hero maksimal 50 karakter',
            'heroDescription.required' => 'Deskripsi hero wajib diisi',
            'heroDescription.string' => 'Deskripsi hero harus berupa teks',
            'image.required' => 'Gambar hero wajib diupload',
            'image.mimes' => 'Format gambar harus jpg, jpeg, atau png',
            'image.max' => 'Ukuran gambar maksimal 2MB'
        ];

        $validationRules = [
            'heroTitle' => 'required|string|max:50',
            'heroDescription' => 'required|string',
        ];

        if ($this->existingImage) {
            $validationRules['image'] = $this->image ? 'mimes:jpg,jpeg,png|max:2048' : '';
        } else {
            $validationRules['image'] = 'required|mimes:jpg,jpeg,png|max:2048';
        }

        $this->validate($validationRules, $customMessages);

        $imageUrl = $this->existingImage;
        if ($this->image) {
            // Generate timestamp for unique filename
            $timestamp = time();
            $filename = 'produk-hero-' . $timestamp . '.' . $this->image->getClientOriginalExtension();

            // If new image is uploaded, store it with timestamped name and update URL
            $imageUrl = 'storage/' . $this->image->storeAs('img/sections', $filename, 'public');

            // Delete old image if exists
            if (
                $this->existingImage &&
                Storage::disk('public')->exists(str_replace('storage/', '', $this->existingImage))
            ) {
                Storage::disk('public')->delete(str_replace('storage/', '', $this->existingImage));
            }
        }

        $section->update([
            'title' => $this->heroTitle,
            'description' => $this->heroDescription,
            'image_url' => $imageUrl,
        ]);

        Toaster::success('Data berhasil disimpan');
        $this->handleCloseForm();
    }

    public function render()
    {
        $section = Section::where('section_name', 'produk-hero')->first();

        return view('livewire.produk-hero', [
            'section' => $section,
        ]);
    }
}
