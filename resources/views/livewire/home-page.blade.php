{{--
|--------------------------------------------------------------------------
| HOME PAGE — PT JAYA ABADI KONSTRUKSI
|--------------------------------------------------------------------------
| FINAL RULES (JANGAN DILANGGAR):
| - Blade = MARKUP ONLY
| - TIDAK ADA:
|   - inline style
|   - inline script
|   - JS behavior
|   - business logic
|
| - Semua class DI-SCOPE dengan prefix "home-"
| - Semua styling ada di home-page.css
| - Semua behavior ada di home-page.js
| - Gunakan wire:navigate untuk SPA navigation
|--------------------------------------------------------------------------
--}}

<section class="home-page">

    {{-- ======================================================
         HERO SECTION - Modern Hero with Gradient & Stats
         ====================================================== --}}
    <section class="home-hero">
        <div class="container">
            <div class="row align-items-center g-5">

                {{-- HERO TEXT --}}
                <div class="col-12 col-lg-6">
                    <div class="home-hero-badge" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                        <span class="home-hero-badge-text">Terpercaya Sejak 2013</span>
                    </div>

                    <h1 class="home-hero-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        Membangun Masa Depan dengan
                        <span class="home-hero-highlight">Inovasi & Keunggulan</span>
                    </h1>

                    <p class="home-hero-subtitle" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        Jaya Abadi Konstruksi - Partner terpercaya untuk solusi konstruksi
                        gedung dan infrastruktur industri berstandar internasional.
                    </p>

                    {{-- Hero Stats --}}
                    <div class="home-hero-stats">
                        <div class="home-stat-item" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="600">
                            <span class="home-stat-number">500+</span>
                            <span class="home-stat-label">Proyek Selesai</span>
                        </div>
                        <div class="home-stat-item" data-aos="zoom-in" data-aos-delay="400" data-aos-duration="600">
                            <span class="home-stat-number">10+</span>
                            <span class="home-stat-label">Tahun Pengalaman</span>
                        </div>
                        <div class="home-stat-item" data-aos="zoom-in" data-aos-delay="500" data-aos-duration="600">
                            <span class="home-stat-number">98%</span>
                            <span class="home-stat-label">Kepuasan Klien</span>
                        </div>
                    </div>

                    {{-- Hero CTA --}}
                    <div class="home-hero-actions" data-aos="fade-up" data-aos-delay="600" data-aos-duration="700">
                        <a wire:navigate href="/proyek" class="home-btn home-btn-primary">
                            <span>Lihat Portofolio</span>
                            <svg class="home-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a wire:navigate href="/kontak" class="home-btn home-btn-outline">
                            <span>Konsultasi Gratis</span>
                        </a>
                    </div>
                </div>

                {{-- HERO VISUAL --}}
                <div class="col-12 col-lg-6">
                    <div class="home-hero-visual" data-aos="fade-in-left" data-aos-delay="200" data-aos-duration="800">
                        <div class="home-hero-image-wrapper">
                            <img src="/images/home/hero-project.jpg"
                                 alt="Proyek konstruksi modern PT Jaya Abadi Konstruksi"
                                 class="home-hero-image"
                                 loading="eager">
                        </div>

                        {{-- Floating Achievement Badge --}}
                        {{-- <div class="home-floating-badge home-badge-award">
                            <svg class="home-badge-icon" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2L15.09 8.26L22 9.27L17 14.14L18.18 21.02L12 17.77L5.82 21.02L7 14.14L2 9.27L8.91 8.26L12 2Z"/>
                            </svg>
                            <span>ISO 9001:2015 Certified</span>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         TRUSTED BY SECTION
         ====================================================== --}}
    <section class="home-trusted">
        <div class="container">
            <p class="home-trusted-label" data-aos="fade-up" data-aos-duration="600">Dipercaya Oleh</p>
            <div class="home-trusted-logos">
                <div class="home-trusted-logo text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="600">Lucy In The Sky <br> PT Lima Dua Lima Tiga Tbk</div>
                <div class="home-trusted-logo" data-aos="fade-up" data-aos-delay="200" data-aos-duration="600">PT Wikinara Bening Bersama Putra</div>
                <div class="home-trusted-logo" data-aos="fade-up" data-aos-delay="300" data-aos-duration="600">PMPP TNI</div>
                {{-- <div class="home-trusted-logo">Perusahaan D</div>
                <div class="home-trusted-logo">Perusahaan E</div> --}}
            </div>
        </div>
    </section>

    {{-- ======================================================
         COMPANY SUMMARY - Modern Card Style
         ====================================================== --}}
    <section class="home-about">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-12 col-lg-6">
                    <div class="home-about-visual" data-aos="fade-in-right" data-aos-duration="800">
                        <div class="home-about-image-wrapper">
                            <img src="/images/founder.jpg"
                                 alt="Tim profesional PT Jaya Abadi Konstruksi"
                                 class="home-about-image"
                                 loading="lazy">
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="home-about-content">
                        <h2 class="home-section-title" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                            <span class="home-section-subtitle">Tentang Perusahaan</span>
                            Membangun Kepercayaan melalui Kualitas & Inovasi
                        </h2>

                        <p class="home-about-text" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                            Sebagai perusahaan konstruksi terkemuka di Indonesia,
                            kami berkomitmen memberikan solusi konstruksi terintegrasi
                            dengan standar kualitas tertinggi dan teknologi terkini.
                        </p>

                        <div class="home-about-features">
                            <div class="home-feature-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                                <svg class="home-feature-icon" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M5 13l4 4L19 7"/>
                                </svg>
                                <div>
                                    <h4 class="home-feature-title">Berkualitas Tinggi</h4>
                                    <p class="home-feature-desc">Material premium & standar SNI</p>
                                </div>
                            </div>
                            <div class="home-feature-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                                <svg class="home-feature-icon" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path d="M12 15v3m0 3v-3m0 0h3m-3 0H9m12-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <h4 class="home-feature-title">Tepat Waktu</h4>
                                    <p class="home-feature-desc">Disiplin dalam jadwal proyek</p>
                                </div>
                            </div>
                        </div>

                        <a wire:navigate href="/tentang-kami" class="home-btn home-btn-link" data-aos="fade-up" data-aos-delay="400" data-aos-duration="700">
                            <span>Pelajari Selengkapnya</span>
                            <svg class="home-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================
         SERVICES PREVIEW - Card Grid with Icons
         ====================================================== --}}
    <section class="home-services">
        <div class="container">
            <div class="home-section-header">
                <h2 class="home-section-title text-center" data-aos="fade-up" data-aos-duration="700">
                    <span class="home-section-subtitle">Solusi Terintegrasi</span>
                    Layanan Konstruksi Unggulan
                </h2>
                <p class="home-section-desc text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Menyediakan berbagai solusi konstruksi untuk kebutuhan industri,
                    komersial, dan infrastruktur.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="home-service-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <div class="home-service-icon-wrapper">
                            <svg class="home-service-icon" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="home-service-title">Konstruksi Gedung</h3>
                        <p class="home-service-text">
                            Pembangunan gedung industri, komersial, perkantoran,
                            dan fasilitas pendukung dengan teknologi terkini.
                        </p>
                        <ul class="home-service-list">
                            <li>Gedung Perkantoran</li>
                            <li>Pabrik & Industri</li>
                            <li>Fasilitas Komersial</li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="home-service-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        <div class="home-service-icon-wrapper">
                            <svg class="home-service-icon" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/>
                            </svg>
                        </div>
                        <h3 class="home-service-title">Infrastruktur</h3>
                        <p class="home-service-text">
                            Pembangunan jalan, drainase, dan infrastruktur
                            kawasan industri yang berkelanjutan.
                        </p>
                        <ul class="home-service-list">
                            <li>Jalan Industri</li>
                            <li>Sistem Drainase</li>
                            <li>Infrastruktur Kawasan</li>
                        </ul>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="home-service-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <div class="home-service-icon-wrapper">
                            <svg class="home-service-icon" width="32" height="32" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-8 4-8-4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="home-service-title">Renovasi & Perawatan</h3>
                        <p class="home-service-text">
                            Renovasi bangunan, perkuatan struktur,
                            dan pemeliharaan fasilitas secara berkala.
                        </p>
                        <ul class="home-service-list">
                            <li>Renovasi Struktur</li>
                            <li>Perawatan Fasilitas</li>
                            <li>Upgrade Sistem</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center mt-6 spasi-tombol">
                <a wire:navigate href="/layanan" class="home-btn home-btn-secondary" data-aos="fade-up" data-aos-delay="400" data-aos-duration="700">
                    <span>Jelajahi Semua Layanan</span>
                    <svg class="home-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ======================================================
         FEATURED PROJECTS - Modern Portfolio Grid
         ====================================================== --}}
    <section class="home-projects">
        <div class="container">
            <div class="home-section-header">
                <h2 class="home-section-title" data-aos="fade-up" data-aos-duration="700">
                    <span class="home-section-subtitle">Portofolio Terbaru</span>
                    Proyek Unggulan Kami
                </h2>
                <p class="home-section-desc" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Bukti nyata keahlian kami dalam menyelesaikan proyek-proyek
                    konstruksi berkualitas tinggi.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <article class="home-project-card" data-aos="zoom-in-up" data-aos-delay="100" data-aos-duration="700">
                        <div class="home-project-image-wrapper">
                            <img src="/images/home/proyek.jpg"
                                 alt="Gedung Industri Manufaktur Modern"
                                 class="home-project-image"
                                 loading="lazy">
                            <div class="home-project-overlay">
                                <a wire:navigate href="/proyek" class="home-project-view">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="home-project-content">
                            <div class="home-project-category">Gedung Industri</div>
                            <h3 class="home-project-name">Gedung Industri Manufaktur</h3>
                            <p class="home-project-desc">Bangunan industri dengan teknologi otomasi terbaru</p>
                            <div class="home-project-meta">
                                <span class="home-project-meta-item">Lokasi: Jakarta</span>
                                <span class="home-project-meta-item">Luas: 5,000 m²</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <article class="home-project-card" data-aos="zoom-in-up" data-aos-delay="200" data-aos-duration="700">
                        <div class="home-project-image-wrapper">
                            <img src="/images/home/proyek2.jpg"
                                 alt="Infrastruktur Kawasan Industri"
                                 class="home-project-image"
                                 loading="lazy">
                            <div class="home-project-overlay">
                                <a wire:navigate href="/proyek" class="home-project-view">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="home-project-content">
                            <div class="home-project-category">Infrastruktur</div>
                            <h3 class="home-project-name">Infrastruktur Kawasan Industri</h3>
                            <p class="home-project-desc">Jaringan jalan dan drainase kawasan industri terpadu</p>
                            <div class="home-project-meta">
                                <span class="home-project-meta-item">Lokasi: Bekasi</span>
                                <span class="home-project-meta-item">Panjang: 3.5 km</span>
                            </div>
                        </div>
                    </article>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <article class="home-project-card" data-aos="zoom-in-up" data-aos-delay="300" data-aos-duration="700">
                        <div class="home-project-image-wrapper">
                            <img src="/images/home/proyek3.jpg"
                                 alt="Renovasi Fasilitas Produksi"
                                 class="home-project-image"
                                 loading="lazy">
                            <div class="home-project-overlay">
                                <a wire:navigate href="/proyek" class="home-project-view">
                                    <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="home-project-content">
                            <div class="home-project-category">Renovasi</div>
                            <h3 class="home-project-name">Renovasi Fasilitas Produksi</h3>
                            <p class="home-project-desc">Modernisasi fasilitas produksi dengan standar terbaru</p>
                            <div class="home-project-meta">
                                <span class="home-project-meta-item">Lokasi: Tangerang</span>
                                <span class="home-project-meta-item">Durasi: 4 Bulan</span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>

            <div class="text-center mt-6 spasi-tombol">
                <a wire:navigate href="/proyek" class="home-btn home-btn-primary" data-aos="fade-up" data-aos-delay="400" data-aos-duration="700">
                    <span>Lihat Semua Proyek</span>
                    <svg class="home-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M5 12h14M12 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    {{-- ======================================================
         CTA SECTION - Modern Call to Action
         ====================================================== --}}
    <section class="home-cta">
        <div class="container">
            <div class="home-cta-content">
                <h2 class="home-cta-title" data-aos="fade-up" data-aos-duration="700">
                    Siap Membangun Proyek Impian Anda?
                </h2>
                <p class="home-cta-desc" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Konsultasikan kebutuhan konstruksi Anda dengan tim ahli kami.
                    Dapatkan solusi terbaik untuk proyek Anda.
                </p>
                <div class="home-cta-actions" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    <a wire:navigate href="/kontak" class="home-btn home-btn-light">
                        <span>Hubungi Kami Sekarang</span>
                        <svg class="home-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M21 3l-6.5 18a.55.55 0 01-1 0L10 14l-7-3.5a.55.55 0 010-1L21 3z"/>
                        </svg>
                    </a>
                    <a href="javascript:void(0)"
                       class="home-btn home-btn-outline-light external-link"
                       data-link="https://wa.me/6287817695973"
                       rel="noopener noreferrer">
                        <svg class="home-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/>
                        </svg>
                        <span>0878-1769-5973</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</section>
