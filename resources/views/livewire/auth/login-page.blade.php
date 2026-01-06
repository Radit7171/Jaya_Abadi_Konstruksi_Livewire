<div class="auth-login-page">
    <div class="auth-container">
        <!-- Logo Header -->
        <div class="auth-logo-section">
            <img
                src="/images/logo-jaya-abadi-konstruksi.png"
                alt="Jaya Abadi Konstruksi Logo"
                class="auth-logo">
        </div>

        <!-- Header -->
        <div class="auth-header">
            <h1 class="auth-title">Masuk ke Akun</h1>
            <p class="auth-subtitle">Selamat datang kembali di PT Jaya Abadi Konstruksi</p>
        </div>

        <!-- Login Form -->
        <form wire:submit="login" class="auth-form" novalidate>
            <!-- Email Field -->
            <div class="auth-form-group">
                <div class="auth-label-wrapper">
                    <label for="email" class="auth-label">Email Address</label>
                    @error('email')
                        <span class="auth-label-error">{{ $message }}</span>
                    @enderror
                </div>
                <input
                    type="email"
                    id="email"
                    wire:model="email"
                    class="auth-input @error('email') auth-input-error @enderror"
                    placeholder="nama@example.com"
                    required
                    autocomplete="email">
            </div>

            <!-- Password Field -->
            <div class="auth-form-group">
                <div class="auth-label-wrapper">
                    <label for="password" class="auth-label">Password</label>
                    @error('password')
                        <span class="auth-label-error">{{ $message }}</span>
                    @enderror
                </div>
                <input
                    type="password"
                    id="password"
                    wire:model="password"
                    class="auth-input @error('password') auth-input-error @enderror"
                    placeholder="••••••••"
                    required
                    autocomplete="current-password">
            </input>

            <!-- Remember Me -->
            <div class="auth-form-group auth-form-group-checkbox">
                <label class="auth-checkbox-label">
                    <input
                        type="checkbox"
                        wire:model="remember"
                        class="auth-checkbox"
                        id="remember">
                    <span class="auth-checkbox-text">Ingat saya selama 24 jam</span>
                </label>
            </div>

            <!-- Submit Button -->
            <button
                type="submit"
                class="auth-btn auth-btn-primary"
                wire:loading.attr="disabled">
                <span wire:loading.remove>Masuk</span>
                <span wire:loading>
                    <i class="fas fa-spinner fa-spin"></i> Sedang memproses...
                </span>
            </button>

            <!-- Loading State -->
            <div wire:loading.delay class="auth-loading-state">
                <p>Memverifikasi data login Anda...</p>
            </div>
        </form>

        <!-- Footer Link -->
        <div class="auth-footer">
            <p class="auth-footer-text">
                Belum punya akun?
                <a href="/" wire:navigate class="auth-footer-link">Kembali ke Beranda</a>
            </p>
        </div>
    </div>
</div>
