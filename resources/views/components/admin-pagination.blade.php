@if ($paginator->hasPages())
    <nav class="admin-pagination-wrapper" role="navigation" aria-label="Pagination Navigation">

        <!-- Pagination Info -->
        <div class="admin-pagination-info">
            <span class="pagination-current">
                Menampilkan <strong>{{ $paginator->firstItem() }}</strong> sampai <strong>{{ $paginator->lastItem() }}</strong>
            </span>
            <span class="pagination-separator">dari</span>
            <span class="pagination-total">
                <strong>{{ $paginator->total() }}</strong> total
            </span>
        </div>

        <!-- Pagination Links -->
        <ul class="admin-pagination-list">
            {{-- First Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="admin-pagination-item disabled">
                    <span class="admin-pagination-link" aria-disabled="true">
                        <i class="fas fa-step-backward"></i>
                    </span>
                </li>
            @else
                <li class="admin-pagination-item">
                    <a href="{{ route('admin.projects') }}"
                       wire:navigate
                       class="admin-pagination-link"
                       aria-label="First page">
                        <i class="fas fa-step-backward"></i>
                    </a>
                </li>
            @endif

            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="admin-pagination-item disabled">
                    <span class="admin-pagination-link" aria-disabled="true">
                        <i class="fas fa-chevron-left"></i>
                        <span class="pagination-label">Sebelumnya</span>
                    </span>
                </li>
            @else
                <li class="admin-pagination-item">
                    <a href="{{ route('admin.projects', ['page' => $paginator->currentPage() - 1]) }}"
                       wire:navigate
                       class="admin-pagination-link"
                       rel="prev"
                       aria-label="Previous page">
                        <i class="fas fa-chevron-left"></i>
                        <span class="pagination-label">Sebelumnya</span>
                    </a>
                </li>
            @endif

            {{-- Page Numbers --}}
            @php
                $start = max($paginator->currentPage() - 2, 1);
                $end = min($start + 4, $paginator->lastPage());

                if ($end - $start < 4) {
                    $start = max($end - 4, 1);
                }
            @endphp

            @if ($start > 1)
                <li class="admin-pagination-item">
                    <a href="{{ route('admin.projects') }}"
                       wire:navigate
                       class="admin-pagination-link"
                       aria-label="Go to page 1">
                        1
                    </a>
                </li>
                @if ($start > 2)
                    <li class="admin-pagination-item disabled">
                        <span class="admin-pagination-link pagination-dots">
                            ...
                        </span>
                    </li>
                @endif
            @endif

            @for ($i = $start; $i <= $end; $i++)
                @if ($i == $paginator->currentPage())
                    <li class="admin-pagination-item active">
                        <span class="admin-pagination-link" aria-current="page">
                            {{ $i }}
                        </span>
                    </li>
                @else
                    <li class="admin-pagination-item">
                        @if ($i === 1)
                            <a href="{{ route('admin.projects') }}"
                               wire:navigate
                               class="admin-pagination-link"
                               aria-label="Go to page {{ $i }}">
                                {{ $i }}
                            </a>
                        @else
                            <a href="{{ route('admin.projects', ['page' => $i]) }}"
                               wire:navigate
                               class="admin-pagination-link"
                               aria-label="Go to page {{ $i }}">
                                {{ $i }}
                            </a>
                        @endif
                    </li>
                @endif
            @endfor

            @if ($end < $paginator->lastPage())
                @if ($end < $paginator->lastPage() - 1)
                    <li class="admin-pagination-item disabled">
                        <span class="admin-pagination-link pagination-dots">
                            ...
                        </span>
                    </li>
                @endif
                <li class="admin-pagination-item">
                    <a href="{{ route('admin.projects', ['page' => $paginator->lastPage()]) }}"
                       wire:navigate
                       class="admin-pagination-link"
                       aria-label="Go to page {{ $paginator->lastPage() }}">
                        {{ $paginator->lastPage() }}
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="admin-pagination-item">
                    <a href="{{ route('admin.projects', ['page' => $paginator->currentPage() + 1]) }}"
                       wire:navigate
                       class="admin-pagination-link"
                       rel="next"
                       aria-label="Next page">
                        <span class="pagination-label">Selanjutnya</span>
                        <i class="fas fa-chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="admin-pagination-item disabled">
                    <span class="admin-pagination-link" aria-disabled="true">
                        <span class="pagination-label">Selanjutnya</span>
                        <i class="fas fa-chevron-right"></i>
                    </span>
                </li>
            @endif

            {{-- Last Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="admin-pagination-item">
                    <a href="{{ route('admin.projects', ['page' => $paginator->lastPage()]) }}"
                       wire:navigate
                       class="admin-pagination-link"
                       aria-label="Last page">
                        <i class="fas fa-step-forward"></i>
                    </a>
                </li>
            @else
                <li class="admin-pagination-item disabled">
                    <span class="admin-pagination-link" aria-disabled="true">
                        <i class="fas fa-step-forward"></i>
                    </span>
                </li>
            @endif
        </ul>

        <!-- Pages Summary -->
        <div class="admin-pagination-summary">
            Halaman <strong>{{ $paginator->currentPage() }}</strong> dari <strong>{{ $paginator->lastPage() }}</strong>
        </div>
    </nav>
@endif
