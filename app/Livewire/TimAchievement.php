<?php

namespace App\Livewire;

use App\Models\Achievement;
use App\Models\Headline;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class TimAchievement extends Component
{
    public $isShowHeadlineForm = false;
    public $headlineTitle = '';
    public $headlineSubtitle = '';

    public $isShowContentForm = false;

    public $branchCount;
    public $employeeCount;
    public $customerCount;


    public function handleOpenHeadlineForm()
    {
        $this->isShowHeadlineForm = true;
        $headline = Headline::where('section_name', 'tim-achievement')->first();

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
        $headline = Headline::where('section_name', 'tim-achievement')->first();
        if (!$headline) {
            Toaster::error('Headline tidak ditemukan');
            return;
        }

        $this->validate([
            'headlineTitle' => [
                'required' => 'Judul headline harus diisi',
                'string' => 'Judul headline harus berupa teks',
                'max:50' => 'Judul headline tidak boleh lebih dari 50 karakter'
            ],
            'headlineSubtitle' => [
                'required' => 'Subjudul headline harus diisi',
                'string' => 'Subjudul headline harus berupa teks',
                'max:100' => 'Subjudul headline tidak boleh lebih dari 100 karakter'
            ],
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
        // Fetch all required achievements in a single query
        $achievements = Achievement::whereIn('label', ['Cabang', 'Karyawan', 'Customer'])
            ->get()
            ->keyBy('label');

        // Map achievements to respective properties
        $this->branchCount = $achievements['Cabang']['count'] ?? null;
        $this->employeeCount = $achievements['Karyawan']['count'] ?? null;
        $this->customerCount = $achievements['Customer']['count'] ?? null;

        $this->isShowContentForm = true;
    }

    public function handleCloseContentForm()
    {
        $this->isShowContentForm = false;
        $this->reset('branchCount', 'employeeCount', 'customerCount');
    }

    public function handleSaveContent()
    {
        $this->validate([
            'branchCount' => [
                'required' => 'Jumlah cabang harus diisi',
                'integer' => 'Jumlah cabang harus berupa angka'
            ],
            'employeeCount' => [
                'required' => 'Jumlah karyawan harus diisi',
                'integer' => 'Jumlah karyawan harus berupa angka'
            ],
            'customerCount' => [
                'required' => 'Jumlah pelanggan harus diisi',
                'integer' => 'Jumlah pelanggan harus berupa angka'
            ],
        ]);

        // Update branch count
        Achievement::where('label', 'Cabang')->update([
            'count' => $this->branchCount
        ]);

        // Update employee count
        Achievement::where('label', 'Karyawan')->update([
            'count' => $this->employeeCount
        ]);

        // Update customer count
        Achievement::where('label', 'Customer')->update([
            'count' => $this->customerCount
        ]);

        Toaster::success('Achievement berhasil di perbarui');
        $this->handleCloseContentForm();
    }

    public function render()
    {
        $headline = Headline::where('section_name', 'tim-achievement')->first();
        $stats = Achievement::get();

        return view('livewire.tim-achievement', [
            'headline' => $headline,
            'stats' => $stats
        ]);
    }
}
