{{-- Contact Component --}}
@props(['mobile' => false])

<div class="footer-contact {{ $mobile ? 'mobile-version' : '' }}">
    @if(!$mobile)
        <h3 class="h6 fw-bold mb-3">Kontak</h3>
    @endif

    <ul class="list-unstyled mb-0">
        <li class="mb-2 d-flex align-items-start">
            <i class="bi bi-geo-alt text-primary me-2 mt-1"></i>
            <span class="small text-body-secondary">
                Jl. Industri Raya No. 123<br>
                Jakarta Barat, 11730
            </span>
        </li>
        <li class="mb-2 d-flex align-items-center">
            <i class="bi bi-telephone text-primary me-2"></i>
            <a href="tel:+62211234567" class="small text-body-secondary text-decoration-none">
                (021) 123-4567
            </a>
        </li>
        <li class="mb-2 d-flex align-items-center">
            <i class="bi bi-envelope text-primary me-2"></i>
            <a href="mailto:info@jayaabadi.com" class="small text-body-secondary text-decoration-none">
                info@jayaabadi.com
            </a>
        </li>
        <li class="d-flex align-items-center">
            <i class="bi bi-clock text-primary me-2"></i>
            <span class="small text-body-secondary">
                Senin - Jumat: 08:00 - 17:00
            </span>
        </li>
    </ul>
</div>
