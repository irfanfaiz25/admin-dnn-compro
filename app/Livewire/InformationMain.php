<?php

namespace App\Livewire;

use App\Models\Information;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class InformationMain extends Component
{
    use WithFileUploads;

    public $companyName = '';
    public $companyLogo;
    public $existingCompanyLogo;

    public $email = '';
    public $phone = '';
    public $whatsapp = '';


    public $facebook = '';
    public $instagram = '';
    public $twitter = '';
    public $linkedin = '';


    public function mount()
    {
        $this->initialForm();
    }

    public function initialForm()
    {
        $information = Information::all()->pluck('value', 'name')->toArray();

        $this->companyName = $information['company_name'] ?? '';
        $this->existingCompanyLogo = Information::where('name', 'company_name')->first()?->image_url;
        $this->email = $information['email'] ?? '';
        $this->phone = $information['phone'] ?? '';
        $this->whatsapp = $information['whatsapp'] ?? '';
        $this->facebook = $information['facebook'] ?? '';
        $this->instagram = $information['instagram'] ?? '';
        $this->twitter = $information['twitter'] ?? '';
        $this->linkedin = $information['linkedin'] ?? '';
    }

    public function handleSave()
    {
        // Validate the input data
        $this->validate([
            'companyName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'whatsapp' => 'required|string',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'companyLogo' => 'nullable|image|max:2048', // Max 2MB
        ]);

        // Update or create company information
        $fields = [
            'company_name' => $this->companyName,
            'email' => $this->email,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'linkedin' => $this->linkedin,
        ];

        foreach ($fields as $name => $value) {
            Information::updateOrCreate(
                ['name' => $name],
                ['value' => $value]
            );
        }

        // Handle logo upload if new logo is provided
        $imageUrl = $this->existingCompanyLogo;
        if ($this->companyLogo) {
            $timestamp = time();
            $fileName = 'logo_' . $timestamp . '.' . $this->companyLogo->getClientOriginalExtension();
            $imageUrl = 'storage/' . $this->companyLogo->storeAs('img', $fileName, 'public');

            Information::where('name', 'company_name')->update([
                'image_url' => $imageUrl
            ]);
        }

        Toaster::success('Informasi perusahaan berhasil disimpan');
        $this->initialForm();
    }

    public function handleResetForm()
    {
        $this->initialForm();
    }

    public function render()
    {
        return view('livewire.information-main');
    }
}
