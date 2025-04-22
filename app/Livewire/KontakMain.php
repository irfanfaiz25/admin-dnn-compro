<?php

namespace App\Livewire;

use App\Models\Contact;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class KontakMain extends Component
{
    public $isShowForm = false;
    public $address = '';
    public $phone = '';
    public $whatsapp = '';
    public $email = '';
    public $weekdayOpen = '';
    public $weekendOpen = '';


    public function handleOpenForm()
    {
        $this->isShowForm = true;
        $contact = Contact::first();
        if ($contact) {
            $this->address = $contact->address;
            $this->phone = $contact->phone;
            $this->whatsapp = $contact->whatsapp;
            $this->email = $contact->email;
            $this->weekdayOpen = $contact->weekday_open;
            $this->weekendOpen = $contact->weekend_open;
        }
    }

    public function handleCloseForm()
    {
        $this->isShowForm = false;
        $this->reset('address', 'phone', 'whatsapp', 'email', 'weekdayOpen', 'weekendOpen');
    }

    public function handleSave()
    {
        $this->validate([
            'address' => 'required|string|max:150',
            'phone' => 'required|string|max:20',
            'whatsapp' => 'required|string|max:20',
            'email' => 'required|string|email|max:50',
            'weekdayOpen' => 'required|string|max:50',
            'weekendOpen' => 'required|string|max:50',
        ], [
            'address.required' => 'Alamat harus diisi',
            'address.max' => 'Alamat maksimal 150 karakter',
            'phone.required' => 'Nomor telepon harus diisi',
            'phone.max' => 'Nomor telepon maksimal 20 karakter',
            'whatsapp.required' => 'Nomor WhatsApp harus diisi',
            'whatsapp.max' => 'Nomor WhatsApp maksimal 20 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak valid',
            'email.max' => 'Email maksimal 50 karakter',
            'weekdayOpen.required' => 'Jam buka hari kerja harus diisi',
            'weekdayOpen.max' => 'Jam buka hari kerja maksimal 50 karakter',
            'weekendOpen.required' => 'Jam buka akhir pekan harus diisi',
            'weekendOpen.max' => 'Jam buka akhir pekan maksimal 50 karakter'
        ]);

        $contact = Contact::firstOrCreate();
        $contact->update([
            'address' => $this->address,
            'phone' => $this->phone,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
            'weekday_open' => $this->weekdayOpen,
            'weekend_open' => $this->weekendOpen,
        ]);

        Toaster::success('Data berhasil disimpan');
        $this->handleCloseForm();
    }

    public function render()
    {
        $contact = Contact::first();

        return view('livewire.kontak-main', [
            'contact' => $contact,
        ]);
    }
}
