{{--
    Custom Pagination View for Projects Page
    PT Jaya Abadi Konstruksi
    Modern, clean, and professional look
--}}
@if ($paginator->hasPages())
    <nav class="projects-pagination-nav" aria-label="Projects Pagination">
        <ul class="projects-pagination-list">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="projects-pagination-item disabled" aria-disabled="true">
                    <span class="projects-pagination-link">&laquo;</span>
                </li>
            @else
                <li class="projects-pagination-item">
                    <a wire:navigate href="{{ $paginator->previousPageUrl() }}" rel="prev" class="projects-pagination-link" aria-label="Sebelumnya">&laquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="projects-pagination-item disabled" aria-disabled="true"><span class="projects-pagination-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="projects-pagination-item active" aria-current="page"><span class="projects-pagination-link">{{ $page }}</span></li>
                        @else
                            <li class="projects-pagination-item"><a wire:navigate href="{{ $url }}" class="projects-pagination-link">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="projects-pagination-item">
                    <a wire:navigate href="{{ $paginator->nextPageUrl() }}" rel="next" class="projects-pagination-link" aria-label="Berikutnya">&raquo;</a>
                </li>
            @else
                <li class="projects-pagination-item disabled" aria-disabled="true">
                    <span class="projects-pagination-link">&raquo;</span>
                </li>
            @endif
        </ul>
    </nav>
@endif
