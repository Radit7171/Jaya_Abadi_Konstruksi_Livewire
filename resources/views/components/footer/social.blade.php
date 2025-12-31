{{-- Social Media Component --}}
<div class="footer-social">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-end">
        <span class="small text-body-secondary mb-2 mb-md-0 me-md-3">Ikuti Kami:</span>
        <div class="social-icons d-flex gap-2">
            @php
                $socialLinks = [
                    ['icon' => 'bi-facebook', 'url' => '#', 'label' => 'Facebook'],
                    ['icon' => 'bi-instagram', 'url' => '#', 'label' => 'Instagram'],
                    ['icon' => 'bi-linkedin', 'url' => '#', 'label' => 'LinkedIn'],
                    ['icon' => 'bi-whatsapp', 'url' => '#', 'label' => 'WhatsApp'],
                ];
            @endphp

            @foreach($socialLinks as $social)
                <a href="{{ $social['url'] }}"
                   class="social-icon d-flex align-items-center justify-content-center"
                   aria-label="{{ $social['label'] }}"
                   target="_blank">
                    <i class="{{ $social['icon'] }}"></i>
                </a>
            @endforeach
        </div>
    </div>
</div>
