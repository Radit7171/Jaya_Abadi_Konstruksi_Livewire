{{-- Brand Component --}}
<div class="footer-brand">
    <div class="d-flex align-items-center">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
            <div class="footer-logo-wrapper me-2">
                <img src="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}"
                     alt="Jaya Abadi Konstruksi"
                     width="40"
                     height="40"
                     class="rounded-circle object-fit-cover"
                     loading="lazy">
            </div>
            <div>
                <h2 class="fw-bold mb-0" style="font-size: 0.95rem;">Jaya Abadi Konstruksi</h2>
                <p class="mb-0 text-muted" style="font-size: 0.75rem;">Spesialis Konstruksi Baja</p>
            </div>


        </a>
    </div>

    {{-- Description (Hidden on small mobile, shown on tablet+) --}}
    <div class="footer-description mt-3 d-none d-sm-block">
        <p class="text-muted mb-0" style="font-size: 0.8rem; line-height: 1.5;">
            Solusi konstruksi baja terpercaya dengan pengalaman lebih dari 10 tahun di industri konstruksi Indonesia.
        </p>
    </div>
</div>
