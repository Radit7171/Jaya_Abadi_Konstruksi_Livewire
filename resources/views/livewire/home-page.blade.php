{{--
|--------------------------------------------------------------------------
| HOME PAGE — JAYA ABADI KONSTRUKSI
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
        {{-- Decorative Elements --}}
        <div class="home-hero-decorator decorator-1"></div>
        <div class="home-hero-decorator decorator-2"></div>

        <div class="container relative-z">
            <div class="row align-items-center g-5">

                {{-- HERO TEXT --}}
                <div class="col-12 col-lg-6">
                    <div class="home-hero-badge" data-aos="fade-down" data-aos-delay="0" data-aos-duration="800">
                        <span class="home-hero-badge-dot"></span>
                        <span class="home-hero-badge-text">Inovasi Konstruksi Terpercaya</span>
                    </div>

                    <h1 class="home-hero-title" data-aos="fade-right" data-aos-delay="100" data-aos-duration="1000">
                        Membangun Masa Depan dengan
                        <span class="home-hero-highlight">
                            Kualitas Premium
                            <svg class="home-hero-underline" viewBox="0 0 300 15" preserveAspectRatio="none">
                                <path d="M5,10 C100,5 200,5 295,10" stroke="currentColor" stroke-width="4" fill="none" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </h1>

                    <p class="home-hero-subtitle" data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000">
                        Jaya Abadi Konstruksi menghadirkan standar baru dalam industri konstruksi baja dan beton.
                        Solusi tepat guna, efisien, dan bergaransi untuk infrastruktur masa depan.
                    </p>

                    {{-- Hero Stats --}}
                    <div class="home-hero-stats" data-aos="fade-up" data-aos-delay="400" data-aos-duration="800">
                        <div class="home-stat-item">
                            <span class="home-stat-number">500<small>+</small></span>
                            <span class="home-stat-label">Proyek Selesai</span>
                        </div>
                        <div class="home-stat-divider"></div>
                        <div class="home-stat-item">
                            <span class="home-stat-number">10<small>+</small></span>
                            <span class="home-stat-label">Tahun Berkarya</span>
                        </div>
                        <div class="home-stat-divider"></div>
                        <div class="home-stat-item">
                            <span class="home-stat-number">98<small>%</small></span>
                            <span class="home-stat-label">Klien Puas</span>
                        </div>
                    </div>

                    {{-- Hero CTA --}}
                    <div class="home-hero-actions" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                        <a wire:navigate href="/proyek" class="home-btn home-btn-primary home-btn-lg">
                            <span>Eksplorasi Proyek</span>
                            <i class="fas fa-arrow-right home-btn-icon"></i>
                        </a>
                        <a wire:navigate href="/kontak" class="home-btn home-btn-outline home-btn-lg">
                            <span>Hubungi Ahli</span>
                        </a>
                    </div>
                </div>

                {{-- HERO VISUAL --}}
                <div class="col-12 col-lg-6">
                    <div class="home-hero-visual-wrapper" data-aos="zoom-in" data-aos-delay="300" data-aos-duration="1200">
                        <div class="home-hero-visual">
                            <div class="home-hero-image-main">
                                <img src="/images/home/hero-project.jpg"
                                     alt="Proyek konstruksi modern Jaya Abadi Konstruksi"
                                     class="home-hero-img shadow-lg"
                                     loading="eager">
                            </div>

                            {{-- Floating Badges --}}
                            <div class="home-glass-card card-1" data-aos="fade-left" data-aos-delay="800">
                                <div class="home-glass-icon bg-primary">
                                    <i class="fas fa-check-circle"></i>
                                </div>
                                <div class="home-glass-content">
                                    <span class="fw-bold">Pengerjaan Presisi</span>
                                    <span class="small opacity-75">Hasil Akurat & Kokoh</span>
                                </div>
                            </div>

                            <div class="home-glass-card card-2" data-aos="fade-up" data-aos-delay="1000">
                                <div class="home-glass-icon bg-success">
                                    <i class="fas fa-tools"></i>
                                </div>
                                <div class="home-glass-content">
                                    <span class="fw-bold">Tenaga Ahli</span>
                                    <span class="small opacity-75">Profesional Berpengalaman</span>
                                </div>
                            </div>
                        </div>
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
                                 alt="Tim profesional Jaya Abadi Konstruksi"
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
                                <div class="home-feature-icon-wrapper">
                                    <i class="fas fa-award"></i>
                                </div>
                                <div>
                                    <h4 class="home-feature-title">Material Kualitas Tinggi</h4>
                                    <p class="home-feature-desc">Hanya menggunakan material pilihan untuk daya tahan maksimal.</p>
                                </div>
                            </div>
                            <div class="home-feature-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                                <div class="home-feature-icon-wrapper">
                                    <i class="fas fa-history"></i>
                                </div>
                                <div>
                                    <h4 class="home-feature-title">Tepat Waktu</h4>
                                    <p class="home-feature-desc">Disiplin dan efisien dalam setiap tahapan jadwal proyek.</p>
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
            <header class="home-section-header text-center" data-aos="fade-up">
                <span class="home-section-subtitle">Layanan Unggulan</span>
                <h2 class="home-section-title">Solusi Konstruksi Menyeluruh</h2>
                <div class="home-header-line"></div>
                <p class="home-section-desc mx-auto" style="max-width: 700px;">
                    Kami menyediakan berbagai layanan konstruksi profesional yang didukung oleh tenaga ahli berpengalaman dan teknologi modern untuk hasil terbaik.
                </p>
            </header>

            <div class="row g-4 mt-2">
                {{-- Service 1 --}}
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="home-service-card shadow-sm">
                        <div class="home-service-icon">
                            <i class="fas fa-industry"></i>
                        </div>
                        <h3 class="home-service-title">Konstruksi Baja</h3>
                        <p class="home-service-text">Spesialis gudang, pabrik, dan struktur baja berat dengan presisi tinggi dan efisiensi waktu.</p>
                        <ul class="home-service-list">
                            <li><i class="fas fa-check"></i> Struktur Pabrik & Gudang</li>
                            <li><i class="fas fa-check"></i> Jembatan Rangka Baja</li>
                            <li><i class="fas fa-check"></i> Konstruksi Hanggar</li>
                        </ul>
                        <div class="home-service-footer">
                            <a wire:navigate href="/layanan" class="home-service-link">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Service 2 --}}
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="home-service-card shadow-sm active">
                        <div class="home-service-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <h3 class="home-service-title">Gedung Bertingkat</h3>
                        <p class="home-service-text">Pembangunan gedung perkantoran, hotel, dan apartemen dengan standar keamanan ketat.</p>
                        <ul class="home-service-list">
                            <li><i class="fas fa-check"></i> Struktur Beton Bertulang</li>
                            <li><i class="fas fa-check"></i> Manajemen Proyek</li>
                            <li><i class="fas fa-check"></i> Finishing Interior & Eksterior</li>
                        </ul>
                        <div class="home-service-footer">
                            <a wire:navigate href="/layanan" class="home-service-link">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Service 3 --}}
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="home-service-card shadow-sm">
                        <div class="home-service-icon">
                            <i class="fas fa-road"></i>
                        </div>
                        <h3 class="home-service-title">Infrastruktur Jalan</h3>
                        <p class="home-service-text">Pengerjaan jalan beton, aspal, dan sistem drainase untuk area industri dan publik.</p>
                        <ul class="home-service-list">
                            <li><i class="fas fa-check"></i> Perkerasan Lentur & Kaku</li>
                            <li><i class="fas fa-check"></i> Saluran Irigasi</li>
                            <li><i class="fas fa-check"></i> Penataan Lahan</li>
                        </ul>
                        <div class="home-service-footer">
                            <a wire:navigate href="/layanan" class="home-service-link">
                                <span>Selengkapnya</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a wire:navigate href="/layanan" class="home-btn home-btn-outline">
                    Lihat Semua Layanan <i class="fas fa-th-large ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- ======================================================
         FEATURED PROJECTS - Modern Portfolio Grid
         ====================================================== --}}
    <section class="home-projects">
        <div class="container pb-5">
            <header class="home-section-header text-center" data-aos="fade-up">
                <span class="home-section-subtitle">Keahlian Kami</span>
                <h2 class="home-section-title">Portofolio Proyek Terkini</h2>
                <div class="home-header-line"></div>
                <p class="home-section-desc mx-auto" style="max-width: 700px;">
                    Hasil kerja nyata kami dalam berbagai sektor konstruksi, dari industri hingga infrastruktur publik.
                </p>
            </header>

            <div class="row g-4 mt-2">
                {{-- Project Card 1 --}}
                <div class="col-12 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="100">
                    <div class="home-project-card-new shadow-sm">
                        <div class="home-project-img-container">
                            <img src="/images/home/proyek.jpg" alt="Gedung Industri" class="home-project-img">
                            <div class="home-project-badge-float">Gedung Industri</div>
                        </div>
                        <div class="home-project-body">
                            <h3 class="home-project-title-new">Gedung Manufaktur Modern</h3>
                            <p class="home-project-text-new small">Pembangunan pabrik industri dengan struktur baja berat & sistem integrasi modern.</p>
                            <div class="home-project-info">
                                <div class="info-item">
                                    <i class="fas fa-location-dot"></i>
                                    <span>Jakarta</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-expand-arrows-alt"></i>
                                    <span>5,000 m²</span>
                                </div>
                            </div>
                            <div class="home-project-footer">
                                <a wire:navigate href="/proyek" class="home-project-btn">
                                    <span>Detail Proyek</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Project Card 2 --}}
                <div class="col-12 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                    <div class="home-project-card-new shadow-sm">
                        <div class="home-project-img-container">
                            <img src="/images/home/proyek2.jpg" alt="Infrastruktur" class="home-project-img">
                            <div class="home-project-badge-float">Infrastruktur</div>
                        </div>
                        <div class="home-project-body">
                            <h3 class="home-project-title-new">Jalan Kawasan Industri</h3>
                            <p class="home-project-text-new small">Pengerjaan infrastruktur jalan beton dan sistem drainase terpadu.</p>
                            <div class="home-project-info">
                                <div class="info-item">
                                    <i class="fas fa-location-dot"></i>
                                    <span>Bekasi</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-road"></i>
                                    <span>3.5 KM</span>
                                </div>
                            </div>
                            <div class="home-project-footer">
                                <a wire:navigate href="/proyek" class="home-project-btn">
                                    <span>Detail Proyek</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Project Card 3 --}}
                <div class="col-12 col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                    <div class="home-project-card-new shadow-sm">
                        <div class="home-project-img-container">
                            <img src="/images/home/proyek3.jpg" alt="Renovasi" class="home-project-img">
                            <div class="home-project-badge-float">Perawatan</div>
                        </div>
                        <div class="home-project-body">
                            <h3 class="home-project-title-new">Perbaikan Struktur Gudang</h3>
                            <p class="home-project-text-new small">Renovasi dan perkuatan struktur baja pada fasilitas logistik utama.</p>
                            <div class="home-project-info">
                                <div class="info-item">
                                    <i class="fas fa-location-dot"></i>
                                    <span>Tangerang</span>
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-calendar-check"></i>
                                    <span>4 Bulan</span>
                                </div>
                            </div>
                            <div class="home-project-footer">
                                <a wire:navigate href="/proyek" class="home-project-btn">
                                    <span>Detail Proyek</span>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a wire:navigate href="/proyek" class="home-btn home-btn-primary home-btn-lg">
                    <span>Lihat Semua Portofolio</span>
                    <i class="fas fa-th-large ms-2"></i>
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
