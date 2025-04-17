<?php

namespace App\Livewire;

use App\Models\Section;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class TimHero extends Component
{
    use WithFileUploads;

    public $isShowForm = false;
    public $image;
    public $existingImage;
    public $heroTitle = '';
    public $heroDescription = '';


    public function handleOpenForm()
    {
        $this->isShowForm = true;
        $section = Section::where('section_name', 'tim-hero')->first();
        if (!$section) {
            Toaster::error('Konten tidak ditemukan.');
        }

        $this->heroTitle = $section->title;
        $this->heroDescription = $section->description;
        $this->existingImage = $section->image_url;
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->reset('image', 'heroTitle', 'heroDescription', 'existingImage');
    }

    public function handleSave()
    {
        $section = Section::where('section_name', 'tim-hero')->first();
        if (!$section) {
            Toaster::error('Data tidak ditemukan');
            return;
        }

        $validationRules = [
            'heroTitle' => 'required|string|max:100',
            'heroDescription' => 'required|string|max:255',
        ];

        if ($this->existingImage) {
            $validationRules['image'] = $this->image ? 'mimes:jpg,jpeg,png|max:2048' : '';
        } else {
            $validationRules['image'] = 'required|mimes:jpg,jpeg,png|max:2048';
        }

        $this->validate($validationRules);

        $imageUrl = $this->existingImage;
        if ($this->image) {
            // Generate timestamp for unique filename
            $timestamp = time();
            $filename = 'tim-hero-' . $timestamp . '.' . $this->image->getClientOriginalExtension();

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
            'title' => $this->heroTitle,
            'description' => $this->heroDescription,
            'image_url' => $imageUrl,
        ]);

        $this->handleCloseForm();
        Toaster::success('Data berhasil di perbarui');
    }

    public function render()
    {
        $section = Section::where('section_name', 'tim-hero')->first();
        return view('livewire.tim-hero', [
            'section' => $section,
        ]);
    }
}
