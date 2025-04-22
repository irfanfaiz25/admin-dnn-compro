<?php

namespace App\Livewire;

use App\Models\Headline;
use App\Models\TeamTestimonial;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class TimTestimonial extends Component
{
    use WithFileUploads;

    public $isShowHeadlineForm = false;
    public $headlineTitle = '';
    public $headlineSubtitle = '';

    public $isEditMode = false;
    public $testimonialId;

    public $isShowContentForm = false;
    public $employeeName = '';
    public $position = '';
    public $image;
    public $existingImage;
    public $message = '';


    public function handleOpenHeadlineForm()
    {
        $this->isShowHeadlineForm = true;
        $headline = Headline::where('section_name', 'tim-testimonial')->first();

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
        $headline = Headline::where('section_name', 'tim-testimonial')->first();
        if (!$headline) {
            Toaster::error('Headline tidak ditemukan');
            return;
        }

        $this->validate([
            'headlineTitle' => 'required|string|max:50',
            'headlineSubtitle' => 'required|string|max:100',
        ], [
            'headlineTitle.required' => 'Judul headline harus diisi',
            'headlineTitle.string' => 'Judul headline harus berupa teks',
            'headlineTitle.max' => 'Judul headline tidak boleh lebih dari 50 karakter',
            'headlineSubtitle.required' => 'Subjudul headline harus diisi',
            'headlineSubtitle.string' => 'Subjudul headline harus berupa teks',
            'headlineSubtitle.max' => 'Subjudul headline tidak boleh lebih dari 100 karakter'
        ]);

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
        $this->isEditMode = false;
        $this->reset('image', 'employeeName', 'position', 'message', 'existingImage');
    }

    public function handleEdit($id)
    {
        $testimonial = TeamTestimonial::find($id);
        if (!$testimonial) {
            Toaster::error('Testimonial tidak ditemukan');
            return;
        }

        $this->isEditMode = true;
        $this->testimonialId = $id;

        $this->employeeName = $testimonial->name;
        $this->position = $testimonial->position;
        $this->message = $testimonial->message;
        $this->existingImage = $testimonial->image;
        $this->handleOpenContentForm();
    }

    public function handleSaveContent()
    {
        $testimonial = TeamTestimonial::find($this->testimonialId);

        $this->validate([
            'employeeName' => 'required|string|max:50',
            'position' => 'required|string|max:50',
            'message' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg|max:2048',
        ], [
            'employeeName.required' => 'Nama karyawan harus diisi',
            'employeeName.string' => 'Nama karyawan harus berupa teks',
            'employeeName.max' => 'Nama karyawan tidak boleh lebih dari 50 karakter',
            'position.required' => 'Posisi harus diisi',
            'position.string' => 'Posisi harus berupa teks',
            'position.max' => 'Posisi tidak boleh lebih dari 50 karakter',
            'message.required' => 'Pesan testimonial harus diisi',
            'message.string' => 'Pesan testimonial harus berupa teks',
            'message.max' => 'Pesan testimonial tidak boleh lebih dari 255 karakter',
            'image.mimes' => 'Format gambar harus jpeg, png, atau jpg',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 2MB'
        ]);

        $image = $this->isEditMode ? $this->existingImage : null;
        if ($this->image) {
            $timestamp = time();
            $fileName = 'employee-' . $timestamp . '.' . $this->image->extension();

            $image = 'storage/' . $this->image->storeAs('img/testimonials', $fileName, 'public');
        }

        // Delete old image if exists
        if (
            $this->isEditMode &&
            $testimonial->image &&
            Storage::disk('public')->exists(str_replace('storage/', '', $testimonial->image))
        ) {
            Storage::disk('public')->delete(str_replace('storage/', '', $testimonial->image));
        }

        if ($this->isEditMode) {
            if (!$testimonial) {
                Toaster::error('Testimonial tidak ditemukan');
                return;
            }

            $testimonial->update([
                'name' => $this->employeeName,
                'position' => $this->position,
                'message' => $this->message,
                'image' => $image,
            ]);

            Toaster::success('Testimonial berhasil di perbarui');
            $this->handleCloseContentForm();
        } else {
            TeamTestimonial::create([
                'name' => $this->employeeName,
                'position' => $this->position,
                'message' => $this->message,
                'image' => $image,
            ]);

            Toaster::success('Testimonial berhasil di tambahkan');
            $this->handleCloseContentForm();
        }
    }

    public function handleDelete()
    {
        $testimonial = TeamTestimonial::find($this->testimonialId);
        if (!$testimonial) {
            Toaster::error('Testimonial tidak ditemukan');
            return;
        }

        // Delete image if exists
        if (
            $testimonial->image &&
            Storage::disk('public')->exists(str_replace('storage/', '', $testimonial->image))
        ) {
            Storage::disk('public')->delete(str_replace('storage/', '', $testimonial->image));
        }

        $testimonial->delete();
        Toaster::success('Testimonial berhasil di hapus');
        $this->handleCloseContentForm();
    }

    public function render()
    {
        $headline = Headline::where('section_name', 'tim-testimonial')->first();
        $testimonials = TeamTestimonial::latest()->get();

        return view('livewire.tim-testimonial', [
            'headline' => $headline,
            'testimonials' => $testimonials,
        ]);
    }
}
