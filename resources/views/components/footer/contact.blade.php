{{-- Contact Component --}}
@props(['mobile' => false])

<div class="footer-contact {{ $mobile ? 'mobile-version' : '' }}">
    @if(!$mobile)
        <h3 class="h6 fw-bold mb-3">Kontak</h3>
    @endif

    <ul class="list-unstyled mb-0">
        <li class="footer-contact-item">
            <div class="footer-contact-icon"><i class="fas fa-location-dot"></i></div>
            <a href="javascript:void(0)"
               class="external-link footer-link p-0 text-start"
               data-link="https://maps.app.goo.gl/4UxsTT3GsyskEiFw9"
               rel="noopener noreferrer">
                Depan SD negeri, Jl. Raya Tapos No.72, Tapos, Kota Depok, Jawa Barat 16459
            </a>
        </li>

        <li class="footer-contact-item">
            <div class="footer-contact-icon"><i class="fas fa-phone"></i></div>
            <a href="javascript:void(0)"
               class="external-link footer-link p-0"
               data-link="https://wa.me/6287817695973"
               rel="noopener noreferrer">
                +62 878 1769 5973
            </a>
        </li>

        <li class="footer-contact-item">
            <div class="footer-contact-icon"><i class="fas fa-envelope"></i></div>
            <a href="javascript:void(0)"
               class="external-link footer-link p-0"
               data-link="mailto:lasjayaabadi123@gmail.com">
                lasjayaabadi123@gmail.com
            </a>
        </li>
        <li class="footer-contact-item">
            <div class="footer-contact-icon"><i class="fas fa-clock"></i></div>
            <span class="footer-link p-0">
                Setiap Hari : 08:00 - 17:00
            </span>
        </li>
    </ul>
</div>
