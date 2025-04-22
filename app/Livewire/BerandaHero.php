<?php

namespace App\Livewire;

use App\Models\Section;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class BerandaHero extends Component
{
    use WithFileUploads;

    public $totalContent = 0;
    public $maxContent = 5;

    public $isShowForm = false;
    public $title = '';
    public $description = '';
    public $image;
    public $existingImage;

    public $isEditMode = false;
    public $sectionId;

    public function mount()
    {
        $this->totalContent = Section::where('section_name', 'beranda-hero')->count();
    }

    public function handleOpenForm()
    {
        $this->isShowForm = true;
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->isEditMode = false;
        $this->sectionId = null;
        $this->title = '';
        $this->description = '';
        $this->image = null;
        $this->existingImage = null;
    }

    public function handleEdit($id)
    {
        $this->handleOpenForm();
        $this->isEditMode = true;
        $this->sectionId = $id;

        $section = Section::find($id);
        $this->title = $section->title;
        $this->description = $section->description;
        $this->existingImage = $section->image_url;
    }

    public function save()
    {
        $section = Section::find($this->sectionId);

        // Base validation rules
        $customMessages = [
            'title.required' => 'Judul harus diisi',
            'title.max' => 'Judul tidak boleh lebih dari 100 karakter',
            'description.required' => 'Deskripsi harus diisi',
            'image.required' => 'Gambar harus diupload',
            'image.mimes' => 'Format gambar harus PNG, JPG, atau JPEG',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB'
        ];

        $validationRules = [
            'title' => 'required|max:100',
            'description' => 'required',
        ];

        // Add image validation rules based on edit mode
        if (!$this->isEditMode) {
            $validationRules['image'] = 'required|mimes:png,jpg,jpeg|max:2048';
        } else {
            // In edit mode, image is optional but must be valid if provided
            $validationRules['image'] = $this->image ? 'mimes:png,jpg,jpeg|max:2048' : '';
        }

        $this->validate($validationRules, $customMessages);

        // Handle image URL
        $imageUrl = $this->existingImage;
        if ($this->image) {
            // Generate timestamp for unique filename
            $timestamp = time();
            $filename = 'beranda-hero-' . $timestamp . '.' . $this->image->getClientOriginalExtension();

            // If new image is uploaded, store it with timestamped name and update URL
            $imageUrl = 'storage/' . $this->image->storeAs('img/sections', $filename, 'public');

            // Delete old image if exists
            if (
                $this->isEditMode && $section->image_url &&
                Storage::disk('public')->exists(str_replace('storage/', '', $section->image_url))
            ) {
                Storage::disk('public')->delete(str_replace('storage/', '', $section->image_url));
            }
        }

        if ($this->isEditMode) {
            if (!$section) {
                Toaster::error('Section tidak ditemukan');
                return;
            }

            $section->update([
                'title' => $this->title,
                'description' => $this->description,
                'image_url' => $imageUrl,
            ]);
        } else {
            Section::create([
                'title' => $this->title,
                'description' => $this->description,
                'image_url' => $imageUrl,
                'section_name' => 'beranda-hero',
            ]);
        }

        $this->totalContent = Section::where('section_name', 'beranda-hero')->count();
        $this->handleCloseForm();

        $message = $this->isEditMode ? 'Data berhasil di ubah' : 'Data berhasil di tambahkan';
        Toaster::success($message);
    }

    public function delete($id)
    {
        $section = Section::find($id);

        if ($section->image_url && Storage::disk('public')->exists(str_replace('storage/', '', $section->image_url))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $section->image_url));
        }

        $section->delete();

        $this->totalContent = Section::where('section_name', 'beranda-hero')->count();
        Toaster::success('Data berhasil dihapus');
    }

    public function render()
    {
        $sections = Section::where('section_name', 'beranda-hero')->latest()->get();
        return view('livewire.beranda-hero', [
            'sections' => $sections
        ]);
    }
}
