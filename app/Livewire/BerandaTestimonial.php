<?php

namespace App\Livewire;

use App\Models\Headline;
use App\Models\UserTestimonial;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Masmerise\Toaster\Toaster;

class BerandaTestimonial extends Component
{
    use WithFileUploads, WithPagination;

    public $isShowHeadlineForm = false;
    public $headlineTitle = '';
    public $headlineSubtitle = '';

    // Updated sort properties
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

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
        $headline = Headline::where('section_name', 'beranda-testimonial')->first();
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
            'headlineTitle.max' => 'Judul headline maksimal 50 karakter',
            'headlineSubtitle.required' => 'Subjudul headline harus diisi',
            'headlineSubtitle.string' => 'Subjudul headline harus berupa teks',
            'headlineSubtitle.max' => 'Subjudul headline maksimal 100 karakter'
        ]);

        $headline->update([
            'title' => $this->headlineTitle,
            'subtitle' => $this->headlineSubtitle,
        ]);

        Toaster::success('Headline berhasil diupdate');
        $this->handleCloseHeadlineForm();
    }

    // Improved sort method
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // If clicking the same field, toggle direction
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // If clicking a new field, set it and default to desc (newest first)
            $this->sortField = $field;
            $this->sortDirection = 'desc';
        }

        // Reset pagination when sorting changes
        $this->resetPage();
    }

    public function handleDelete($id)
    {
        $testimonial = UserTestimonial::find($id);
        if (!$testimonial) {
            Toaster::error('Testimonial tidak ditemukan');
            return;
        }

        $testimonial->delete();
        Toaster::success('Testimonial berhasil dihapus');
    }

    public function render()
    {
        $headline = Headline::where('section_name', 'beranda-testimonial')->first();

        // Improved query with proper sorting
        $testimonials = UserTestimonial::orderBy($this->sortField, $this->sortDirection)
            ->paginate(9);

        return view('livewire.beranda-testimonial', [
            'headline' => $headline,
            'testimonials' => $testimonials,
        ]);
    }
}
