<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class LoginForm extends Component
{
    public $email = '';
    public $password = '';


    public function handleLogin()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $user = User::where('email', $this->email)->first();
        if ($user && Hash::check($this->password, $user->password)) {
            auth()->login($user);
            return redirect()->route('beranda.index');
        }

        Toaster::error('Email atau Password Salah');
        session()->flash('error', 'Email atau Password Salah');
        $this->reset('password');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
