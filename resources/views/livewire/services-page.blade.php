{{--
|--------------------------------------------------------------------------
| SERVICES PAGE — JAYA ABADI KONSTRUKSI
|--------------------------------------------------------------------------
| FINAL RULES (JANGAN DILANGGAR):
| - Blade = MARKUP ONLY
| - TIDAK ADA:
|   - inline style
|   - inline script
|   - JS behavior
|   - business logic
|
| - Semua class DI-SCOPE dengan prefix "services-"
| - Semua styling ada di services-page.css
| - Semua behavior ada di services-page.js
| - Gunakan wire:navigate untuk SPA navigation
|--------------------------------------------------------------------------
--}}

<section class="services-page">

    {{-- ======================================================
         BREADCRUMB NAVIGATION
         ====================================================== --}}
    <nav class="services-breadcrumb" aria-label="Navigasi breadcrumb" data-aos="fade-in" data-aos-delay="0" data-aos-duration="500">
        <div class="container">
            <ol class="services-breadcrumb-list">
                <li><a wire:navigate href="/" class="services-breadcrumb-link">Home</a></li>
                <li><span class="services-breadcrumb-current">Layanan</span></li>
            </ol>
        </div>
    </nav>

    {{-- ======================================================
         HERO SECTION - Services Overview
         ====================================================== --}}
    <section class="services-hero">
        <div class="services-hero-decoration services-hero-decoration-top"></div>
        <div class="services-hero-decoration services-hero-decoration-bottom"></div>

        <div class="container">
            <div class="row align-items-center g-5">

                {{-- HERO TEXT --}}
                <div class="col-12 col-lg-6">
                    <div class="services-hero-badge" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                        <span class="services-hero-badge-icon">
                            <i class="fas fa-wrench"></i>
                        </span>
                        <span class="services-hero-badge-text">Layanan Kami</span>
                    </div>

                    <h1 class="services-hero-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        Solusi Konstruksi
                        <span class="services-hero-highlight">Terlengkap & Terpercaya</span>
                    </h1>

                    <p class="services-hero-subtitle" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        Kami menyediakan layanan konstruksi komprehensif untuk memenuhi
                        kebutuhan industri, komersial, dan infrastruktur Anda dengan standar kualitas tertinggi.
                    </p>

                    {{-- Quick Stats --}}
                    <div class="services-hero-quick-stats" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                        <div class="services-quick-stat">
                            <div class="services-quick-stat-number">500+</div>
                            <div class="services-quick-stat-label">Proyek Selesai</div>
                        </div>
                        <div class="services-quick-stat">
                            <div class="services-quick-stat-number">15+</div>
                            <div class="services-quick-stat-label">Jenis Layanan</div>
                        </div>
                        <div class="services-quick-stat">
                            <div class="services-quick-stat-number">98%</div>
                            <div class="services-quick-stat-label">Kepuasan Klien</div>
                        </div>
                    </div>

                    <div class="services-hero-actions" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <a wire:navigate href="/kontak" class="services-btn services-btn-primary">
                            <span>Konsultasi Gratis</span>
                            <svg class="services-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a wire:navigate href="/proyek" class="services-btn services-btn-outline">
                            <span>Lihat Portfolio</span>
                        </a>
                    </div>
                </div>

                {{-- HERO VISUAL --}}
                <div class="col-12 col-lg-6">
                    <div class="services-hero-visual" data-aos="fade-in-left" data-aos-delay="200" data-aos-duration="800">
                        <div class="services-hero-image-wrapper">
                            <div class="services-hero-image-bg"></div>
                            <img src="/images/home/hero-project.jpg"
                                 alt="Layanan konstruksi Jaya Abadi Konstruksi"
                                 class="services-hero-image"
                                 loading="eager">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         MAIN SERVICES SECTION
         ====================================================== --}}
    <section class="services-main">
        <div class="container">
            <div class="services-section-header" data-aos="fade-up" data-aos-duration="700">
                <h2 class="services-section-title text-center">
                    <span class="services-section-subtitle">Keahlian Kami</span>
                    Layanan Utama
                </h2>
                <p class="services-section-desc text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Berbagai solusi konstruksi yang dirancang khusus untuk memenuhi kebutuhan spesifik proyek Anda
                </p>
            </div>

            <div class="row g-4">

                {{-- SERVICE 1: KONSTRUKSI GEDUNG --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <div class="services-card-top-accent"></div>
                        <div class="services-card-icon-wrapper">
                            <i class="fas fa-building services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Konstruksi Gedung</h3>
                        <p class="services-card-text">
                            Spesialis pembangunan gedung bertingkat, perkantoran modern, dan fasilitas industri
                            dengan teknologi konstruksi terkini.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Gedung Perkantoran & Komersial</li>
                            <li><span class="services-feature-check">✓</span> Pabrik & Fasilitas Industri</li>
                            <li><span class="services-feature-check">✓</span> Bangunan Bertingkat</li>
                            <li><span class="services-feature-check">✓</span> Desain Struktural Modern</li>
                        </ul>
                    </div>
                </div>

                {{-- SERVICE 2: INFRASTRUKTUR --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        <div class="services-card-top-accent"></div>
                        <div class="services-card-icon-wrapper">
                            <i class="fas fa-road services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Infrastruktur</h3>
                        <p class="services-card-text">
                            Pengembangan infrastruktur kawasan industri, jalan, drainase, dan utilitas
                            dengan standar teknik internasional.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Jalan & Transportasi</li>
                            <li><span class="services-feature-check">✓</span> Sistem Drainase</li>
                            <li><span class="services-feature-check">✓</span> Utilitas Kawasan</li>
                            <li><span class="services-feature-check">✓</span> Infrastruktur Hijau</li>
                        </ul>
                    </div>
                </div>

                {{-- SERVICE 3: RENOVASI & PERAWATAN --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <div class="services-card-top-accent"></div>
                        <div class="services-card-icon-wrapper">
                            <i class="fas fa-hammer services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Renovasi & Perawatan</h3>
                        <p class="services-card-text">
                            Layanan renovasi bangunan, perkuatan struktur, dan pemeliharaan fasilitas
                            untuk memperpanjang umur aset.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Renovasi Struktur Bangunan</li>
                            <li><span class="services-feature-check">✓</span> Perkuatan Fondasi</li>
                            <li><span class="services-feature-check">✓</span> Pemeliharaan Berkala</li>
                            <li><span class="services-feature-check">✓</span> Upgrade Sistem Bangunan</li>
                        </ul>
                    </div>
                </div>

                {{-- SERVICE 4: QUALITY ASSURANCE & TESTING --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <div class="services-card-top-accent"></div>
                        <div class="services-card-icon-wrapper">
                            <i class="fas fa-check-double services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Quality Assurance & Testing</h3>
                        <p class="services-card-text">
                            Kontrol kualitas menyeluruh dengan inspeksi berkala, pengujian material, dan standar
                            keamanan konstruksi yang ketat.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Inspeksi Berkala Progres</li>
                            <li><span class="services-feature-check">✓</span> Pengujian Material & Struktur</li>
                            <li><span class="services-feature-check">✓</span> Audit Keselamatan Kerja</li>
                            <li><span class="services-feature-check">✓</span> Dokumentasi Lengkap</li>
                        </ul>
                    </div>
                </div>

                {{-- SERVICE 5: MAINTENANCE & SUPPORT --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        <div class="services-card-top-accent"></div>
                        <div class="services-card-icon-wrapper">
                            <i class="fas fa-tools services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Maintenance & Support</h3>
                        <p class="services-card-text">
                            Layanan pemeliharaan berkelanjutan, perbaikan, dan dukungan teknis purna jual untuk
                            menjaga performa aset konstruksi.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Pemeliharaan Rutin & Berkala</li>
                            <li><span class="services-feature-check">✓</span> Perbaikan & Restorasi</li>
                            <li><span class="services-feature-check">✓</span> Dukungan Teknis 24/7</li>
                            <li><span class="services-feature-check">✓</span> Garansi Layanan</li>
                        </ul>
                    </div>
                </div>

                {{-- SERVICE 6: SUPPLY & PROJECT MANAGEMENT --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <div class="services-card-top-accent"></div>
                        <div class="services-card-icon-wrapper">
                            <i class="fas fa-box services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Supply & Management</h3>
                        <p class="services-card-text">
                            Manajemen material, logistik proyek, dan koordinasi supplier untuk memastikan
                            pengiriman tepat waktu dan efisiensi biaya.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Manajemen Ketersediaan Material</li>
                            <li><span class="services-feature-check">✓</span> Logistik & Pengiriman</li>
                            <li><span class="services-feature-check">✓</span> Koordinasi Supplier</li>
                            <li><span class="services-feature-check">✓</span> Optimasi Biaya Proyek</li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         WHY CHOOSE US SECTION
         ====================================================== --}}
    <section class="services-why">
        <div class="services-why-bg-accent"></div>
        <div class="container">
            <div class="services-section-header" data-aos="fade-up" data-aos-duration="700">
                <h2 class="services-section-title text-center" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                    <span class="services-section-subtitle">Keunggulan Kompetitif</span>
                    Mengapa Memilih Kami?
                </h2>
                <p class="services-section-desc text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Kami memiliki pengalaman bertahun-tahun dan tim profesional yang
                    siap menghadirkan solusi terbaik untuk proyek Anda
                </p>
            </div>

            <div class="row g-4">

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="services-why-card" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="700">
                        <div class="services-why-icon services-why-icon-1">
                            <i class="fas fa-award"></i>
                        </div>
                        <h3 class="services-why-title">Berpengalaman</h3>
                        <p class="services-why-text">
                            Lebih dari 10 tahun mengerjakan berbagai tipe proyek konstruksi berskala besar
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="services-why-card" data-aos="zoom-in" data-aos-delay="150" data-aos-duration="700">
                        <div class="services-why-icon services-why-icon-2">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="services-why-title">Komitmen Kualitas</h3>
                        <p class="services-why-text">
                            Standar konstruksi tinggi dengan inspeksi detail dan kontrol kualitas ketat di setiap tahap
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="services-why-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="700">
                        <div class="services-why-icon services-why-icon-3">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="services-why-title">Terpercaya</h3>
                        <p class="services-why-text">
                            Komitmen penuh terhadap kualitas, keselamatan, dan kepuasan klien
                        </p>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="services-why-card" data-aos="zoom-in" data-aos-delay="250" data-aos-duration="700">
                        <div class="services-why-icon services-why-icon-4">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="services-why-title">Responsif</h3>
                        <p class="services-why-text">
                            Dukungan penuh dari perencanaan hingga penyelesaian proyek
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         PROCESS SECTION
         ====================================================== --}}
    <section class="services-process">
        <div class="container">
            <div class="services-section-header" data-aos="fade-up" data-aos-duration="700">
                <h2 class="services-section-title text-center" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                    <span class="services-section-subtitle">Metodologi Kerja</span>
                    Proses Kerja Kami
                </h2>
                <p class="services-section-desc text-center" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    Sistem manajemen proyek yang terstruktur dan proven untuk memastikan
                    deliverable berkualitas tinggi setiap waktu
                </p>
            </div>

            <ol class="services-process-timeline">

                <li class="services-process-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    <div class="services-process-number">1</div>
                    <div class="services-process-content">
                        <h4 class="services-process-title">Konsultasi & Requirement</h4>
                        <p class="services-process-desc">
                            Memahami kebutuhan spesifik klien, visi proyek, dan parameter teknis melalui diskusi mendalam
                        </p>
                    </div>
                </li>

                <li class="services-process-item" data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">
                    <div class="services-process-number">2</div>
                    <div class="services-process-content">
                        <h4 class="services-process-title">Desain & Perencanaan</h4>
                        <p class="services-process-desc">
                            Membuat desain detail, perhitungan struktur, dan RKS (Rencana Kerja & Syarat-Syarat)
                        </p>
                    </div>
                </li>

                <li class="services-process-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    <div class="services-process-number">3</div>
                    <div class="services-process-content">
                        <h4 class="services-process-title">Persiapan & Mobilisasi</h4>
                        <p class="services-process-desc">
                            Menyiapkan lokasi, material, equipment, dan SDM untuk memulai pekerjaan konstruksi
                        </p>
                    </div>
                </li>

                <li class="services-process-item" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                    <div class="services-process-number">4</div>
                    <div class="services-process-content">
                        <h4 class="services-process-title">Eksekusi & Monitoring</h4>
                        <p class="services-process-desc">
                            Melaksanakan pekerjaan dengan quality control ketat dan monitoring progress real-time
                        </p>
                    </div>
                </li>

                <li class="services-process-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                    <div class="services-process-number">5</div>
                    <div class="services-process-content">
                        <h4 class="services-process-title">Handover & Support</h4>
                        <p class="services-process-desc">
                            Serah terima proyek, dokumentasi lengkap, training pengguna, dan garansi purna jual
                        </p>
                    </div>
                </li>

            </ol>
        </div>
    </section>

    {{-- ======================================================
         CTA SECTION
         ====================================================== --}}
    <section class="services-cta">
        <div class="services-cta-bg-accent"></div>
        <div class="services-cta-decoration services-cta-decoration-top"></div>
        <div class="services-cta-decoration services-cta-decoration-bottom"></div>
        <div class="container">
            <div class="services-cta-content" data-aos="zoom-in" data-aos-duration="700">
                <h2 class="services-cta-title">Siap Mewujudkan Proyek Anda?</h2>
                <p class="services-cta-subtitle">
                    Hubungi kami hari ini untuk konsultasi gratis dan penawaran terbaik untuk proyek Anda
                </p>
                <div class="services-cta-actions">
                    <a wire:navigate href="/kontak" class="services-btn services-btn-primary-light">
                        <span>Hubungi Kami Sekarang</span>
                        <svg class="services-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                    <a wire:navigate href="/" class="services-btn services-btn-outline-light">
                        <span>Kembali ke Home</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

</section>
