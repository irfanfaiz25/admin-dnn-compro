<?php

namespace App\Livewire;

use App\Models\Headline;
use App\Models\Section;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class BerandaProduct extends Component
{
    use WithFileUploads;

    public $isShowHeadlineForm = false;
    public $headlineTitle = '';
    public $headlineSubtitle = '';

    public $isEditMode = false;
    public $sectionId;

    public $isShowContentForm = false;
    public $image;
    public $existingImage;
    public $productTitle = '';
    public $productDescription = '';

    public $totalContent;
    public $maxContent = 3;



    public function mount()
    {
        $this->totalContent = Section::where('section_name', 'beranda-product')->count();
    }

    public function handleOpenHeadlineForm()
    {
        $this->isShowHeadlineForm = true;
        $headline = Headline::where('section_name', 'beranda-product')->first();

        if (!$headline) {
            Toaster::error('Headline tidak ditemukan');
            return;
        }

        $this->headlineTitle = $headline->title;
        $this->headlineSubtitle = $headline->subtitle;
    }

    public function handleCloseHeadlineForm()
    {
        $this->isShowHeadlineForm = false;
        $this->reset('headlineTitle', 'headlineSubtitle');
    }

    public function handleSaveHeadline()
    {
        $headline = Headline::where('section_name', 'beranda-product')->first();
        if (!$headline) {
            Toaster::error('Headline tidak ditemukan');
            return;
        }

        $customMessages = [
            'headlineTitle.required' => 'Judul headline wajib diisi',
            'headlineTitle.string' => 'Judul headline harus berupa teks',
            'headlineTitle.max' => 'Judul headline maksimal 50 karakter',
            'headlineSubtitle.required' => 'Subjudul headline wajib diisi',
            'headlineSubtitle.string' => 'Subjudul headline harus berupa teks',
            'headlineSubtitle.max' => 'Subjudul headline maksimal 100 karakter'
        ];

        $this->validate([
            'headlineTitle' => 'required|string|max:50',
            'headlineSubtitle' => 'required|string|max:100',
        ], $customMessages);

        $headline->update([
            'title' => $this->headlineTitle,
            'subtitle' => $this->headlineSubtitle,
        ]);

        Toaster::success('Headline berhasil di perbarui');
        $this->handleCloseHeadlineForm();
    }

    public function handleOpenContentForm()
    {
        $this->isShowContentForm = true;
    }

    public function handleCloseContentForm()
    {
        $this->isShowContentForm = false;
        $this->reset('productTitle', 'productDescription', 'image', 'existingImage');
    }

    public function handleEdit($id)
    {
        $this->handleOpenContentForm();
        $this->isEditMode = true;
        $this->sectionId = $id;

        $section = Section::find($id);
        if (!$section) {
            Toaster::error('Section tidak ditemukan');
            return;
        }

        $this->productTitle = $section->title;
        $this->productDescription = $section->description;
        $this->existingImage = $section->image_url;
    }

    public function handleSaveContent()
    {
        $section = Section::find($this->sectionId);

        $customMessages = [
            'productTitle.required' => 'Judul produk wajib diisi',
            'productTitle.string' => 'Judul produk harus berupa teks',
            'productTitle.max' => 'Judul produk maksimal 100 karakter',
            'productDescription.required' => 'Deskripsi produk wajib diisi',
            'productDescription.string' => 'Deskripsi produk harus berupa teks',
            'productDescription.max' => 'Deskripsi produk maksimal 255 karakter',
            'image.required' => 'Gambar produk wajib diunggah',
            'image.mimes' => 'Format gambar harus PNG, JPG, atau JPEG',
            'image.max' => 'Ukuran gambar maksimal 2MB'
        ];

        $validationRules = [
            'productTitle' => 'required|string|max:100',
            'productDescription' => 'required|string|max:255',
        ];

        if (!$this->isEditMode) {
            $validationRules['image'] = 'required|mimes:png,jpg,jpeg|max:2048';
        } else {
            $validationRules['image'] = $this->image ? 'mimes:png,jpg,jpeg|max:2048' : '';
        }

        $this->validate($validationRules, $customMessages);

        $imageUrl = $this->existingImage;
        if ($this->image) {
            // Generate timestamp for unique filename
            $timestamp = time();
            $filename = 'beranda-product-' . $timestamp . '.' . $this->image->getClientOriginalExtension();

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
            $section->update([
                'title' => $this->productTitle,
                'description' => $this->productDescription,
                'image_url' => $imageUrl,
            ]);
        } else {
            Section::create([
                'title' => $this->productTitle,
                'description' => $this->productDescription,
                'image_url' => $imageUrl,
                'section_name' => 'beranda-product',
            ]);
        }

        $this->handleCloseContentForm();
        $this->totalContent = Section::where('section_name', 'beranda-product')->count();
        Toaster::success($this->isEditMode ? 'Data berhasil di ubah' : 'Data berhasil di tambahkan');
    }

    public function handleDelete($id)
    {
        $section = Section::find($id);
        if (!$section) {
            Toaster::error('Section tidak ditemukan');
            return;
        }

        if ($section->image_url && Storage::disk('public')->exists(str_replace('storage/', '', $section->image_url))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $section->image_url));
        }

        $section->delete();
        $this->totalContent = Section::where('section_name', 'beranda-product')->count();
        Toaster::success('Data berhasil dihapus');
    }

    public function render()
    {
        $headline = Headline::where('section_name', 'beranda-product')->first();
        $sections = Section::where('section_name', 'beranda-product')->latest()->get();

        return view('livewire.beranda-product', [
            'headline' => $headline,
            'sections' => $sections,
        ]);
    }
}
