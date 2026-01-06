<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

#[Layout('layouts.auth')]
#[Title('Login - Jaya Abadi Konstruksi')]
class LoginPage extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:8',
    ];

    protected $messages = [
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.exists' => 'Email tidak terdaftar di sistem',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal 8 karakter',
    ];

    /**
     * Handle login attempt
     */
    public function login()
    {
        $this->validate();

        // Attempt authentication
        if (Auth::attempt(
            ['email' => $this->email, 'password' => $this->password],
            $this->remember
        )) {
            // Regenerate session for security
            session()->regenerate();

            // Redirect to home after successful login
            return redirect()->route('home');
        }

        // Authentication failed
        $this->addError('password', 'Email atau password salah');
    }

    /**
     * Handle logout
     */
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.login-page');
    }
}
