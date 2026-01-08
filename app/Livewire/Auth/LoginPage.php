<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

#[Layout('layouts.auth')]
#[Title('Login - Jaya Abadi Konstruksi')]
class LoginPage extends Component
{
    #[Validate('required|email', message: 'Email wajib diisi dan harus valid')]
    public string $email = '';

    #[Validate('required|min:8', message: 'Password wajib diisi minimal 8 karakter')]
    public string $password = '';

    public bool $remember = false;

    protected $messages = [
        'email.required' => 'Email wajib diisi',
        'email.email' => 'Format email tidak valid',
        'email.exists' => 'Email tidak terdaftar di sistem',
        'password.required' => 'Password wajib diisi',
        'password.min' => 'Password minimal 8 karakter',
    ];

    /**
     * Real-time validation untuk email
     */
    public function updatedEmail()
    {
        try {
            $this->validateOnly('email', [
                'email' => 'required|email'
            ]);
        } catch (\Exception $e) {
            // Validation failed, errors will be displayed
        }
    }

    /**
     * Real-time validation untuk password
     */
    public function updatedPassword()
    {
        try {
            $this->validateOnly('password', [
                'password' => 'required|min:8'
            ]);
        } catch (\Exception $e) {
            // Validation failed, errors will be displayed
        }
    }

    /**
     * Handle login attempt
     */
    public function login()
    {
        // Validate dengan rules lengkap termasuk exists
        $validated = $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);

        // Attempt authentication
        if (Auth::attempt(
            ['email' => $this->email, 'password' => $this->password],
            $this->remember
        )) {
            // Regenerate session for security
            session()->regenerate();

            // Redirect to admin dashboard after successful login (SPA compatible)
            return redirect()->route('admin.dashboard');
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
