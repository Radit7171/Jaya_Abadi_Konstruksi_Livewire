{{-- Social Media Component --}}
<div class="footer-social">
    <div class="d-flex flex-column flex-md-row align-items-center justify-content-md-end">
        <span class="small text-body-secondary mb-2 mb-md-0 me-md-3">Ikuti Kami:</span>
        <div class="social-icons d-flex gap-2">
            @php
                $socialLinks = [
                    ['icon' => 'fab fa-facebook', 'url' => '#', 'label' => 'Facebook'],
                    ['icon' => 'fab fa-instagram', 'url' => '#', 'label' => 'Instagram'],
                    ['icon' => 'fab fa-linkedin', 'url' => '#', 'label' => 'LinkedIn'],
                    ['icon' => 'fab fa-whatsapp', 'url' => 'https://wa.me/6287817695973', 'label' => 'WhatsApp'],
                ];
            @endphp

            @foreach($socialLinks as $social)
                @if(str_contains($social['url'], 'wa.me'))
                    {{-- WhatsApp external link --}}
                    <a href="javascript:void(0)"
                       class="social-icon external-link d-flex align-items-center justify-content-center"
                       data-link="{{ $social['url'] }}"
                       aria-label="{{ $social['label'] }}"
                       rel="noopener noreferrer">
                        <i class="{{ $social['icon'] }}"></i>
                    </a>
                @else
                    {{-- Other social links (placeholder for now) --}}
                    <a href="{{ $social['url'] }}"
                       class="social-icon d-flex align-items-center justify-content-center"
                       aria-label="{{ $social['label'] }}">
                        <i class="{{ $social['icon'] }}"></i>
                    </a>
                @endif
            @endforeach
        </div>
    </div>
</div>
