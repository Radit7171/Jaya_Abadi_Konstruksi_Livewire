{{--
|--------------------------------------------------------------------------
| PROJECTS PAGE — PT JAYA ABADI KONSTRUKSI
|--------------------------------------------------------------------------
| FINAL RULES (JANGAN DILANGGAR):
| - Blade = MARKUP ONLY
| - TIDAK ADA:
|   - inline style
|   - inline script
|   - JS behavior
|   - business logic
|
| - Semua class DI-SCOPE dengan prefix "projects-"
| - Semua styling ada di projects-page.css
| - Semua behavior ada di projects-page.js
| - Gunakan wire:navigate untuk SPA navigation
|--------------------------------------------------------------------------
--}}

<section class="projects-page">

    {{-- ======================================================
         BREADCRUMB NAVIGATION
         ====================================================== --}}
    <nav class="projects-breadcrumb" aria-label="Navigasi breadcrumb" data-aos="fade-in" data-aos-delay="0" data-aos-duration="500">
        <div class="container">
            <ol class="projects-breadcrumb-list">
                <li><a wire:navigate href="/" class="projects-breadcrumb-link">Home</a></li>
                <li><span class="projects-breadcrumb-current">Proyek</span></li>
            </ol>
        </div>
    </nav>

    {{-- ======================================================
         HERO SECTION - Projects Overview
         ====================================================== --}}
    <section class="projects-hero">
        <div class="projects-hero-decoration projects-hero-decoration-top"></div>
        <div class="projects-hero-decoration projects-hero-decoration-bottom"></div>

        <div class="container">
            <div class="row align-items-center g-5">

                {{-- HERO TEXT --}}
                <div class="col-12 col-lg-6">
                    <div class="projects-hero-badge" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                        <span class="projects-hero-badge-icon">
                            <i class="fas fa-hammer"></i>
                        </span>
                        <span class="projects-hero-badge-text">Portofolio Kami</span>
                    </div>

                    <h1 class="projects-hero-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        Proyek-Proyek
                        <span class="projects-hero-highlight">Berkualitas Tinggi</span>
                    </h1>

                    <p class="projects-hero-subtitle" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        Lihat koleksi lengkap proyek-proyek kami yang telah diselesaikan dengan hasil memuaskan
                        dan memberikan dampak positif bagi klien di berbagai sektor industri dan infrastruktur.
                    </p>

                    {{-- Quick Stats --}}
                    <div class="projects-hero-quick-stats" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                        <div class="projects-quick-stat">
                            <div class="projects-quick-stat-number">500+</div>
                            <div class="projects-quick-stat-label">Proyek Selesai</div>
                        </div>
                        <div class="projects-quick-stat">
                            <div class="projects-quick-stat-number">10+</div>
                            <div class="projects-quick-stat-label">Tahun Pengalaman</div>
                        </div>
                        <div class="projects-quick-stat">
                            <div class="projects-quick-stat-number">98%</div>
                            <div class="projects-quick-stat-label">Kepuasan Klien</div>
                        </div>
                    </div>

                    <div class="projects-hero-actions" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <a wire:navigate href="/kontak" class="projects-btn projects-btn-primary">
                            <span>Konsultasi Gratis</span>
                            <svg class="projects-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a wire:navigate href="/layanan" class="projects-btn projects-btn-outline">
                            <span>Lihat Layanan</span>
                        </a>
                    </div>
                </div>

                {{-- HERO VISUAL --}}
                <div class="col-12 col-lg-6">
                    <div class="projects-hero-visual" data-aos="fade-in-left" data-aos-delay="200" data-aos-duration="800">
                        <div class="projects-hero-image-wrapper">
                            <div class="projects-hero-image-bg"></div>
                            <img src="/images/home/hero-project.jpg"
                                 alt="Proyek konstruksi PT Jaya Abadi Konstruksi"
                                 class="projects-hero-image"
                                 loading="eager">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         PROJECTS GRID SECTION - Main Portfolio
         ====================================================== --}}
    <section class="projects-grid-section">
        <div class="container">

            {{-- Section Header --}}
            <div class="projects-section-header" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                <h2 class="projects-section-title">Portofolio Proyek Terbaru</h2>
                <p class="projects-section-subtitle">Koleksi lengkap proyek-proyek terbaik kami yang telah diselesaikan dengan dedikasi dan profesionalisme</p>
            </div>

            {{-- Filter Controls --}}
            <div class="projects-filter-bar" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
                <div class="projects-filter-wrapper">
                    <button wire:click="filterProjects('all')"
                            @class(['projects-filter-btn', 'projects-filter-btn-active' => $selectedFilter === 'all'])
                            data-filter="all">
                        Semua
                    </button>
                    <button wire:click="filterProjects('konstruksi-gedung')"
                            @class(['projects-filter-btn', 'projects-filter-btn-active' => $selectedFilter === 'konstruksi-gedung'])
                            data-filter="konstruksi-gedung">
                        Konstruksi Gedung
                    </button>
                    <button wire:click="filterProjects('infrastruktur')"
                            @class(['projects-filter-btn', 'projects-filter-btn-active' => $selectedFilter === 'infrastruktur'])
                            data-filter="infrastruktur">
                        Infrastruktur
                    </button>
                    <button wire:click="filterProjects('renovasi')"
                            @class(['projects-filter-btn', 'projects-filter-btn-active' => $selectedFilter === 'renovasi'])
                            data-filter="renovasi">
                        Renovasi
                    </button>
                </div>
            </div>

            {{-- Projects Grid --}}
            <div class="row g-4">

                @forelse($projects as $index => $project)
                    <div class="col-12 col-md-6 col-lg-4"
                         data-aos="fade-up"
                         data-aos-delay="{{ 100 + ($index % 3) * 100 }}"
                         data-aos-duration="700"
                         data-category="{{ $project->category }}">
                        <article class="projects-card">
                            <div class="projects-card-image-wrapper">
                                <img src="{{ $project->image_url ?? '/images/home/hero-project.jpg' }}"
                                     alt="{{ $project->image_alt ?? $project->title }}"
                                     class="projects-card-image"
                                     loading="lazy">
                                <div class="projects-card-overlay">
                                    <div class="projects-card-overlay-content">
                                        <i class="fas fa-eye projects-card-overlay-icon"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="projects-card-content">
                                <span class="projects-card-category">{{ $project->getCategoryLabel() }}</span>
                                <h3 class="projects-card-title">{{ $project->title }}</h3>
                                <p class="projects-card-description">{{ $project->getShortDescription() }}</p>
                                <a href="#" class="projects-card-link">
                                    Lihat Detail
                                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="projects-empty-state">
                            <i class="fas fa-inbox projects-empty-icon"></i>
                            <h3 class="projects-empty-title">Tidak ada proyek</h3>
                            <p class="projects-empty-text">Belum ada proyek dalam kategori ini. Silakan pilih kategori lain.</p>
                        </div>
                    </div>
                @endforelse

            </div>

            {{-- Pagination Links --}}
            <div class="projects-pagination" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">
                {{ $projects->links('vendor.pagination.projects') }}
            </div>

        </div>
    </section>

    {{-- ======================================================
         CTA SECTION - Call to Action
         ====================================================== --}}
    <section class="projects-cta">
        <div class="projects-cta-decoration projects-cta-decoration-top"></div>
        <div class="projects-cta-decoration projects-cta-decoration-bottom"></div>

        <div class="container">
            <div class="projects-cta-content" data-aos="zoom-in" data-aos-delay="0" data-aos-duration="700">
                <h2 class="projects-cta-title">Siap Mewujudkan Proyek Impian Anda?</h2>
                <p class="projects-cta-subtitle">Hubungi tim profesional kami untuk konsultasi dan solusi konstruksi yang tepat</p>

                <div class="projects-cta-actions">
                    <a wire:navigate href="/kontak" class="projects-btn projects-btn-primary-light">
                        <span>Hubungi Kami Sekarang</span>
                        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <a wire:navigate href="/" class="projects-btn projects-btn-outline-light">
                        <span>Kembali ke Home</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</section>
