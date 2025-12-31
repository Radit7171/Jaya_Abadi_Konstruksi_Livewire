{{-- Links Component --}}
@props(['title', 'links'])

<div class="footer-links">
    <h3 class="h6 fw-bold mb-3">{{ $title }}</h3>
    <ul class="list-unstyled mb-0">
        @foreach($links as $link)
            <li class="mb-2">
                <a href="{{ url($link['url']) }}"
                   class="footer-link small text-body-secondary text-decoration-none"
                   wire:navigate>
                    {{ $link['label'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
