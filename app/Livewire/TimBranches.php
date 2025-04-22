<?php

namespace App\Livewire;

use App\Models\Branch;
use App\Models\Headline;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class TimBranches extends Component
{
    public $isShowHeadlineForm = false;
    public $headlineTitle = '';
    public $headlineSubtitle = '';

    public $isShowContentForm = false;
    public $isEditMode = false;
    public $branchId;
    public $city = '';
    public $region = '';
    public $established = '';
    public $address = '';


    public function handleOpenHeadlineForm()
    {
        $this->isShowHeadlineForm = true;
        $headline = Headline::where('section_name', 'tim-branches')->first();

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
        $headline = Headline::where('section_name', 'tim-branches')->first();
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
        $this->isShowContentForm = true;
    }

    public function handleCloseContentForm()
    {
        $this->isShowContentForm = false;
        $this->isEditMode = false;
        $this->reset('branchId', 'city', 'region', 'established', 'address');
    }

    public function handleEditBranch($branchId)
    {
        $this->isEditMode = true;
        $this->isShowContentForm = true;
        $this->branchId = $branchId;

        $branch = Branch::find($branchId);
        if (!$branch) {
            Toaster::error('Cabang tidak ditemukan');
            return;
        }

        $this->city = $branch->city;
        $this->region = $branch->region;
        $this->established = $branch->established;
        $this->address = $branch->address;
    }

    public function handleSaveContent()
    {
        $this->validate([
            'city' => [
                'required' => 'Nama kota harus diisi',
                'string' => 'Nama kota harus berupa teks',
                'max:30' => 'Nama kota tidak boleh lebih dari 30 karakter'
            ],
            'region' => [
                'required' => 'Nama wilayah harus diisi',
                'string' => 'Nama wilayah harus berupa teks',
                'max:30' => 'Nama wilayah tidak boleh lebih dari 30 karakter'
            ],
            'established' => [
                'required' => 'Tahun pendirian harus diisi',
                'string' => 'Tahun pendirian harus berupa teks',
                'max:30' => 'Tahun pendirian tidak boleh lebih dari 30 karakter'
            ],
            'address' => [
                'required' => 'Alamat harus diisi',
                'string' => 'Alamat harus berupa teks',
                'max:100' => 'Alamat tidak boleh lebih dari 100 karakter'
            ],
        ]);

        if ($this->isEditMode) {
            $branch = Branch::find($this->branchId);
            if (!$branch) {
                Toaster::error('Cabang tidak ditemukan');
                return;
            }

            $branch->update([
                'city' => $this->city,
                'region' => $this->region,
                'established' => $this->established,
                'address' => $this->address,
            ]);
        } else {
            Branch::create([
                'city' => $this->city,
                'region' => $this->region,
                'established' => $this->established,
                'address' => $this->address,
            ]);
        }

        $message = $this->isEditMode ? 'Cabang berhasil di perbarui' : 'Cabang berhasil ditambahkan';
        Toaster::success($message);
        $this->handleCloseContentForm();
    }

    public function handleDeleteBranch()
    {
        $branch = Branch::find($this->branchId);
        if (!$branch) {
            Toaster::error('Cabang tidak ditemukan');
            return;
        }

        $branch->delete();
        Toaster::success('Cabang berhasil dihapus');
        $this->handleCloseContentForm();
    }

    public function render()
    {
        $headline = Headline::where('section_name', 'tim-branches')->first();
        $branches = Branch::orderBy('established', 'desc')->get();

        return view('livewire.tim-branches', [
            'headline' => $headline,
            'branches' => $branches
        ]);
    }
}
