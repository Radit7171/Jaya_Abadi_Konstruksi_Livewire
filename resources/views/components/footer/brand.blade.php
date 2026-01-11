{{-- Brand Component --}}
<div class="footer-brand">
    <div class="d-flex align-items-center">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
            <div class="footer-logo-wrapper me-3">
                <img src="{{ asset('images/logo-jaya-abadi-konstruksi.png') }}"
                     alt="Jaya Abadi Konstruksi"
                     width="50"
                     height="50"
                     class="rounded-circle object-fit-cover"
                     loading="lazy">
            </div>
            <div>
                <h2 class="h6 fw-bold mb-0">Jaya Abadi Konstruksi</h2>
                <p class="small text-body-secondary mb-0">Spesialis Konstruksi Baja</p>
            </div>
        </a>
    </div>

    {{-- Description (Hidden on small mobile, shown on tablet+) --}}
    <div class="footer-description mt-3 d-none d-sm-block">
        <p class="small text-body-secondary mb-0">
            Jaya Abadi Konstruksi adalah perusahaan spesialis konstruksi baja terpercaya
            dengan pengalaman lebih dari 10 tahun.
        </p>
    </div>
</div>
