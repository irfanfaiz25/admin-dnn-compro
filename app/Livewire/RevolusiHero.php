<?php

namespace App\Livewire;

use App\Models\Section;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;
use Storage;

class RevolusiHero extends Component
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
        $section = Section::where('section_name', 'revolusi-hero')->first();
        if ($section) {
            $this->heroTitle = $section->title;
            $this->heroDescription = $section->description;
            $this->existingImage = $section->image_url;
        }
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->reset('image', 'existingImage', 'heroTitle', 'heroDescription');
    }

    public function handleSave()
    {
        $section = Section::where('section_name', 'revolusi-hero')->first();
        if (!$section) {
            Toaster::error('Section tidak ditemukan');
            return;
        }

        $validationRules = [
            'heroTitle' => 'required|string|max:50',
            'heroDescription' => 'required|string',
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
            $filename = 'revolusi-hero-' . $timestamp . '.' . $this->image->getClientOriginalExtension();

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
        $section = Section::where('section_name', 'revolusi-hero')->first();

        return view('livewire.revolusi-hero', [
            'section' => $section,
        ]);
    }
}
