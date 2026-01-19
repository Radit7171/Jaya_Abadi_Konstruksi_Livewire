{{-- resources/views/components/footer/copyright.blade.php --}}
<div class="footer-copyright">
    <p class="small text-body-secondary mb-2">
        &copy; {{ date('Y') }} Jaya Abadi Konstruksi. All rights reserved.
    </p>

    {{-- Ganti ini --}}
    {{-- <x-footer.theme-toggle compact="true" /> --}}

    {{-- Menjadi ini --}}
    <x-theme-toggle compact="true" showLabel="false" />

    <div class="footer-legal-links mt-2">
        <a href="/kebijakan-privasi" wire:navigate class="small text-body-secondary text-decoration-none me-3">
            Kebijakan Privasi
        </a>
        <a href="/syarat-ketentuan" wire:navigate class="small text-body-secondary text-decoration-none">
            Syarat & Ketentuan
        </a>
    </div>
</div>
