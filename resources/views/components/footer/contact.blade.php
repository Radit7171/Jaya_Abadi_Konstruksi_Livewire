{{-- Contact Component --}}
@props(['mobile' => false])

<div class="footer-contact {{ $mobile ? 'mobile-version' : '' }}">
    @if(!$mobile)
        <h3 class="h6 fw-bold mb-3">Kontak</h3>
    @endif

    <ul class="list-unstyled mb-0">
        <li class="mb-2 d-flex align-items-start">
            <i class="fas fa-location-dot text-primary me-2 mt-1"></i>
            <span class="small text-body-secondary">
                Jaya Abadi Konstruksi<br>
                Jl. Raya Tapos No 72, Cimpaeun, Tapos, Kota Depok
            </span>
        </li>
        <li class="mb-2 d-flex align-items-center">
            <i class="fas fa-phone text-primary me-2"></i>
            <a href="javascript:void(0)"
               class="external-link small text-body-secondary text-decoration-none"
               data-link="https://wa.me/6287817695973"
               rel="noopener noreferrer">
                0878-1769-5973
            </a>
        </li>
        <li class="mb-2 d-flex align-items-center">
            <i class="fas fa-envelope text-primary me-2"></i>
            <a href="javascript:void(0)"
               class="external-link small text-body-secondary text-decoration-none"
               data-link="mailto:lasjayaabadi123@gmail.com">
                lasjayaabadi123@gmail.com
            </a>
        </li>
        <li class="d-flex align-items-center">
            <i class="fas fa-clock text-primary me-2"></i>
            <span class="small text-body-secondary">
                Setiap Hari : 08:00 - 17:00
            </span>
        </li>
    </ul>
</div>
