@php
    $logoPath = asset('images/logo-jaya-abadi-konstruksi.png');
    $fallbackText = 'Jaya Abadi Konstruksi';
@endphp

<a class="navbar-brand py-1" href="/" wire:navigate>
    <img
        src="{{ $logoPath }}"
        alt="{{ $fallbackText }}"
        class="navbar-logo"
        onerror="this.style.display='none'; this.nextElementSibling.style.display='inline-block';"
    >
    <span class="fw-bold d-none">{{ $fallbackText }}</span>
</a>
