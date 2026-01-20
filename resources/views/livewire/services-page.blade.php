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
        <div class="services-hero-decorator decorator-1"></div>
        <div class="services-hero-decorator decorator-2"></div>
        <div class="services-hero-decorator decorator-3"></div>

        <div class="container relative-z">
            <div class="row align-items-center g-4">

                {{-- HERO TEXT --}}
                <div class="col-12 col-lg-6">
                    <div class="services-hero-badge" data-aos="fade-down" data-aos-delay="0" data-aos-duration="600">
                        <span class="services-hero-badge-dot"></span>
                        <span class="services-hero-badge-text">Solusi Konstruksi</span>
                    </div>

                    <h1 class="services-hero-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        Layanan Ahli
                        <span class="services-hero-highlight">
                            Pembangunan Modern
                            <svg class="services-hero-underline" viewBox="0 0 300 15" preserveAspectRatio="none">
                                <path d="M5,10 C100,5 200,5 295,10" stroke="currentColor" stroke-width="4" fill="none" stroke-linecap="round"/>
                            </svg>
                        </span>
                    </h1>

                    <p class="services-hero-subtitle" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        Menghadirkan ekosistem layanan konstruksi terintegrasi dengan teknologi terbaru untuk mewujudkan infrastruktur berkualitas tinggi.
                    </p>

                    {{-- Quick Stats --}}
                    <div class="services-hero-quick-stats" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                        <div class="services-quick-stat">
                            <div class="services-quick-stat-number">500<small>+</small></div>
                            <div class="services-quick-stat-label">Proyek Selesai</div>
                        </div>
                        <div class="services-stat-divider"></div>
                        <div class="services-quick-stat">
                            <div class="services-quick-stat-number">12<small>+</small></div>
                            <div class="services-quick-stat-label">Tahun Berkarya</div>
                        </div>
                        <div class="services-stat-divider"></div>
                        <div class="services-quick-stat">
                            <div class="services-quick-stat-number">100<small>%</small></div>
                            <div class="services-quick-stat-label">Standard K3</div>
                        </div>
                    </div>

                    <div class="services-hero-actions" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <a wire:navigate href="/kontak" class="services-btn services-btn-primary">
                            <span>Konsultasi Gratis</span>
                            <i class="fas fa-chevron-right ms-2" style="font-size: 0.8rem;"></i>
                        </a>
                        <a wire:navigate href="/proyek" class="services-btn services-btn-outline">
                            <span>Portfolio Proyek</span>
                        </a>
                    </div>
                </div>

                {{-- HERO VISUAL --}}
                <div class="col-12 col-lg-6">
                    <div class="services-hero-visual" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="1000">
                        <div class="services-hero-image-wrapper">
                            <div class="services-hero-image-main">
                                <img src="/images/home/hero-project.jpg"
                                     alt="Layanan konstruksi Jaya Abadi Konstruksi"
                                     class="services-hero-image"
                                     loading="eager">
                            </div>

                            {{-- Floating Badges --}}
                            <div class="services-hero-floating services-hero-floating-1" data-aos="fade-left" data-aos-delay="500">
                                <div class="services-floating-icon">
                                    <i class="fas fa-gem"></i>
                                </div>
                                <div class="services-floating-info">
                                    <span class="services-floating-title">Kualitas Prima</span>
                                </div>
                            </div>

                            <div class="services-hero-floating services-hero-floating-2" data-aos="fade-right" data-aos-delay="700">
                                <div class="services-floating-icon-simple">
                                    <i class="fas fa-microscope"></i>
                                </div>
                                <span class="services-floating-text">Akurasi & Presisi Tinggi</span>
                            </div>
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
                <span class="services-section-label">
                    <i class="fas fa-gears"></i> Keahlian Kami
                </span>
                <h2 class="services-section-title">Layanan Utama</h2>
                <p class="services-section-subtitle">Berbagai solusi konstruksi yang dirancang khusus untuk memenuhi kebutuhan spesifik proyek Anda</p>
            </div>

            <div class="row g-4">

                {{-- SERVICE 1: KONSTRUKSI GEDUNG --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <div class="services-card-top-accent"></div>
                        <div class="services-card-icon-wrapper">
                            <i class="fas fa-city services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Konstruksi Gedung</h3>
                        <p class="services-card-text">
                            Pembangunan gedung bertingkat, perkantoran modern, dan fasilitas industri dengan presisi tinggi.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Komersial & Perkantoran</li>
                            <li><span class="services-feature-check">✓</span> Fasilitas Industri & Pabrik</li>
                            <li><span class="services-feature-check">✓</span> Struktur Beton & Baja</li>
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
                            dengan standar teknik kualitas premium.
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
                            <i class="fas fa-screwdriver-wrench services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Maintenance & Support</h3>
                        <p class="services-card-text">
                            Pemeliharaan aset pasca-konstruksi untuk menjamin fungsionalitas dan keamanan jangka panjang.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Inspeksi Fasilitas Rutin</li>
                            <li><span class="services-feature-check">✓</span> Perbaikan Kerusakan Struktur</li>
                            <li><span class="services-feature-check">✓</span> Konsultasi Teknis & Garansi</li>
                        </ul>
                    </div>
                </div>

                {{-- SERVICE 6: SUPPLY & PROJECT MANAGEMENT --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="services-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <div class="services-card-top-accent"></div>
                        <div class="services-card-icon-wrapper">
                            <i class="fas fa-truck-ramp-box services-card-icon"></i>
                        </div>
                        <h3 class="services-card-title">Supply & Management</h3>
                        <p class="services-card-text">
                            Pengelolaan logistik dan rantai pasok material berkualitas untuk efisiensi proyek yang maksimal.
                        </p>
                        <ul class="services-card-features">
                            <li><span class="services-feature-check">✓</span> Pengadaan Material Premium</li>
                            <li><span class="services-feature-check">✓</span> Manajemen Vendor Terpadu</li>
                            <li><span class="services-feature-check">✓</span> Logistik Konstruksi Efisien</li>
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
            <div class="services-section-header" data-aos="fade-up">
                <span class="services-section-label">
                    <i class="fas fa-check-circle me-1"></i> Keunggulan Kompetitif
                </span>
                <h2 class="services-section-title">Mengapa Memilih Kami?</h2>
                <p class="services-section-subtitle">
                    Kami memiliki pengalaman bertahun-tahun dan tim profesional yang siap menghadirkan solusi terbaik untuk proyek Anda
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
                            <i class="fas fa-gears"></i>
                        </div>
                        <h3 class="services-why-title">Komitmen Kualitas</h3>
                        <p class="services-why-text">
                            Kontrol kualitas yang ketat di setiap tahap pembangunan.
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
            <div class="services-section-header" data-aos="fade-up">
                <span class="services-section-label">
                    <i class="fas fa-stairs me-1"></i> Metodologi Kerja
                </span>
                <h2 class="services-section-title">Proses Kerja Kami</h2>
                <p class="services-section-subtitle">
                    Sistem manajemen proyek yang terstruktur dan terbukti untuk memastikan hasil berkualitas tinggi tepat waktu.
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
