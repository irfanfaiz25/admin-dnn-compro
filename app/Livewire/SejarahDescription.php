<?php

namespace App\Livewire;

use App\Models\Section;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class SejarahDescription extends Component
{
    use WithFileUploads;

    public $isShowForm = false;
    public $title;
    public $description;
    public $image;
    public $existingImage;


    public function handleOpenForm()
    {
        $this->isShowForm = true;
        $section = Section::where('section_name', 'sejarah')->first();
        if (!$section) {
            Toaster::error('Data tidak ditemukan');
            return;
        }

        $this->title = $section->title;
        $this->description = $section->description;
        $this->existingImage = $section->image_url;

        // Use JavaScript evaluation to set editor content after the component is updated
        $this->dispatch('editorContentUpdated', description: $this->description);
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->reset('title', 'description', 'image', 'existingImage');
    }

    public function handleSave()
    {
        $section = Section::where('section_name', 'sejarah')->first();
        if (!$section) {
            Toaster::error('Data tidak ditemukan');
            return;
        }

        $validationRules = [
            'title' => 'required|max:100',
            'description' => 'required',
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
            $filename = 'sejarah-' . $timestamp . '.' . $this->image->getClientOriginalExtension();

            // If new image is uploaded, store it with timestamped name and update URL
            $imageUrl = 'storage/' . $this->image->storeAs('img/sections', $filename, 'public');

            // Delete old image if exists
            if ($section->image_url && Storage::disk('public')->exists(str_replace('storage/', '', $section->image_url))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $section->image_url));
            }
        }

        $section->update([
            'title' => $this->title,
            'description' => $this->description,
            'image_url' => $imageUrl,
        ]);

        $this->handleCloseForm();
        Toaster::success('Data berhasil di ubah');
    }

    public function render()
    {
        $section = Section::where('section_name', 'sejarah')->first();
        return view('livewire.sejarah-description', [
            'section' => $section,
        ]);
    }
}
