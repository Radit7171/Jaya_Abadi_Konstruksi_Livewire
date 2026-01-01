{{--
|--------------------------------------------------------------------------
| ABOUT PAGE — PT JAYA ABADI KONSTRUKSI
|--------------------------------------------------------------------------
| FINAL RULES (JANGAN DILANGGAR):
| - Blade = MARKUP ONLY
| - TIDAK ADA:
|   - inline style
|   - inline script
|   - JS behavior
|   - business logic
|
| - Semua class DI-SCOPE dengan prefix "about-"
| - Semua styling ada di about-page.css
| - Semua behavior ada di about-page.js
| - Gunakan wire:navigate untuk SPA navigation
|--------------------------------------------------------------------------
--}}

<section class="about-page">

    {{-- ======================================================
         BREADCRUMB NAVIGATION
         ====================================================== --}}
    <nav class="about-breadcrumb" aria-label="Navigasi breadcrumb" data-aos="fade-in" data-aos-delay="0" data-aos-duration="500">
        <div class="container">
            <ol class="about-breadcrumb-list">
                <li><a wire:navigate href="/" class="about-breadcrumb-link">Home</a></li>
                <li><span class="about-breadcrumb-current">Tentang Kami</span></li>
            </ol>
        </div>
    </nav>

    {{-- ======================================================
         ABOUT HERO SECTION - Intro with Decorative Elements
         ====================================================== --}}
    <section class="about-hero">
        <div class="about-hero-decoration about-hero-decoration-top"></div>

        <div class="container">
            <div class="row align-items-center g-5">

                {{-- HERO TEXT --}}
                <div class="col-12 col-lg-6">
                    <div class="about-hero-badge" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                        <span class="about-hero-badge-icon">
                            <i class="fas fa-building"></i>
                        </span>
                        <span class="about-hero-badge-text">Tentang Perusahaan Kami</span>
                    </div>

                    <h1 class="about-hero-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        PT Jaya Abadi Konstruksi
                        <span class="about-hero-highlight">Membangun Kepercayaan</span>
                    </h1>

                    <p class="about-hero-subtitle" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        Lebih dari satu dekade berdedikasi menghadirkan solusi konstruksi inovatif,
                        berkualitas premium, dan berstandar internasional untuk memenuhi visi dan impian Anda.
                    </p>

                    {{-- Quick Stats --}}
                    <div class="about-hero-quick-stats" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                        <div class="about-quick-stat">
                            <div class="about-quick-stat-number">500+</div>
                            <div class="about-quick-stat-label">Proyek</div>
                        </div>
                        <div class="about-quick-stat">
                            <div class="about-quick-stat-number">10+</div>
                            <div class="about-quick-stat-label">Tahun</div>
                        </div>
                        <div class="about-quick-stat">
                            <div class="about-quick-stat-number">98%</div>
                            <div class="about-quick-stat-label">Kepuasan</div>
                        </div>
                    </div>

                    <div class="about-hero-actions" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <a wire:navigate href="/kontak" class="about-btn about-btn-primary">
                            <span>Hubungi Kami</span>
                            <svg class="about-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                        <a wire:navigate href="/proyek" class="about-btn about-btn-outline">
                            <span>Lihat Portofolio</span>
                        </a>
                    </div>
                </div>

                {{-- HERO IMAGE --}}
                <div class="col-12 col-lg-6">
                    <div class="about-hero-visual" data-aos="fade-in-left" data-aos-delay="200" data-aos-duration="800">
                        <div class="about-hero-image-wrapper">
                            <div class="about-hero-image-bg"></div>
                            <img src="/images/home/hero-project.jpg"
                                 alt="PT Jaya Abadi Konstruksi - Perusahaan konstruksi profesional"
                                 class="about-hero-image"
                                 loading="eager">
                        </div>
                        {{-- <div class="about-hero-image-overlay">
                            <div class="about-hero-overlay-badge">
                                <i class="fas fa-certificate"></i>
                                <span>ISO 9001:2015</span>
                            </div>
                        </div> --}}
                    </div>
                </div>

            </div>
        </div>

        <div class="about-hero-decoration about-hero-decoration-bottom"></div>
    </section>

    {{-- ======================================================
         COMPANY HISTORY SECTION - Timeline with Modern Layout
         ====================================================== --}}
    <section class="about-history">
        <div class="about-history-bg-pattern"></div>

        <div class="container">
            <div class="row g-5 align-items-stretch">

                {{-- HISTORY IMAGE --}}
                <div class="col-12 col-lg-5">
                    <div class="about-history-visual" data-aos="fade-in-right" data-aos-delay="0" data-aos-duration="800">
                        <div class="about-history-image-wrapper">
                            <div class="about-history-image-bg"></div>
                            <img src="/images/home/hero-project.jpg"
                                 alt="Sejarah dan perkembangan PT Jaya Abadi Konstruksi"
                                 class="about-history-image"
                                 loading="lazy">
                        </div>
                        <div class="about-history-image-badge">
                            <span class="about-history-badge-year">10+</span>
                            <span class="about-history-badge-text">Tahun Berdedikasi</span>
                        </div>
                    </div>
                </div>

                {{-- HISTORY TEXT --}}
                <div class="col-12 col-lg-7">
                    <div class="about-history-content">
                        <span class="about-section-label" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                            <i class="fas fa-hourglass-half"></i> Perjalanan Kami
                        </span>

                        <h2 class="about-history-title" data-aos="fade-up" data-aos-delay="50" data-aos-duration="700">
                            Dari Visi hingga Realitas
                        </h2>

                        <p class="about-history-intro" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                            Didirikan pada tahun 2013, PT Jaya Abadi Konstruksi memulai perjalanan
                            inspiratif dengan visi sederhana namun kuat: menjadi mitra konstruksi
                            terpercaya yang menghadirkan inovasi dan kualitas terbaik untuk setiap proyek.
                        </p>

                        <div class="about-history-timeline" data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">

                            <div class="about-timeline-item">
                                <div class="about-timeline-dot">
                                    <i class="fas fa-rocket"></i>
                                </div>
                                <div class="about-timeline-content">
                                    <h3 class="about-timeline-year">2013</h3>
                                    <p class="about-timeline-text">Peluncuran PT Jaya Abadi Konstruksi dengan fokus strategis pada proyek-proyek konstruksi skala menengah berkualitas tinggi.</p>
                                </div>
                            </div>

                            <div class="about-timeline-item">
                                <div class="about-timeline-dot">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div class="about-timeline-content">
                                    <h3 class="about-timeline-year">2015</h3>
                                    <p class="about-timeline-text">Peningkatan kapasitas operasional dan ekspansi ke berbagai sektor konstruksi dengan sistem manajemen proyek yang semakin matang.</p>
                                </div>
                            </div>

                            <div class="about-timeline-item">
                                <div class="about-timeline-dot">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div class="about-timeline-content">
                                    <h3 class="about-timeline-year">2018</h3>
                                    <p class="about-timeline-text">Pencapaian milestone 200+ proyek sukses dan penghargaan prestisius dari berbagai klien korporat terkemuka.</p>
                                </div>
                            </div>

                            <div class="about-timeline-item">
                                <div class="about-timeline-dot">
                                    <i class="fas fa-crown"></i>
                                </div>
                                <div class="about-timeline-content">
                                    <h3 class="about-timeline-year">2023</h3>
                                    <p class="about-timeline-text">Melampaui 500+ proyek sukses dan menjadi pemimpin industri konstruksi terpercaya dengan reputasi internasional.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         MISSION & VISION SECTION - Dual Card Layout
         ====================================================== --}}
    <section class="about-mission-vision">
        <div class="container">
            <div class="row g-4">

                <div class="col-12">
                    <div class="about-section-header" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                        <span class="about-section-label">
                            <i class="fas fa-compass"></i> Arah & Tujuan
                        </span>
                        <h2 class="about-section-title">Misi & Visi Kami</h2>
                        <p class="about-section-subtitle">Komitmen mendalam terhadap keunggulan, inovasi, dan penciptaan nilai jangka panjang</p>
                    </div>
                </div>

                {{-- MISSION CARD --}}
                <div class="col-12 col-lg-6">
                    <div class="about-card about-mission-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <div class="about-card-corner-accent about-card-corner-accent-1"></div>
                        <div class="about-card-corner-accent about-card-corner-accent-2"></div>

                        <div class="about-card-header">
                            <div class="about-card-icon about-card-icon-mission">
                                <i class="fas fa-target"></i>
                            </div>
                            <h3 class="about-card-title">Misi Kami</h3>
                        </div>

                        <p class="about-card-text">
                            Memberikan solusi konstruksi berkualitas premium dengan mengedepankan
                            inovasi berkelanjutan, komitmen keselamatan kerja tertinggi, dan kepuasan
                            pelanggan dalam setiap proyek yang kami tangani dengan profesionalisme.
                        </p>

                        <div class="about-card-footer">
                            <span class="about-card-badge">Komitmen Kami</span>
                        </div>
                    </div>
                </div>

                {{-- VISION CARD --}}
                <div class="col-12 col-lg-6">
                    <div class="about-card about-vision-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        <div class="about-card-corner-accent about-card-corner-accent-1"></div>
                        <div class="about-card-corner-accent about-card-corner-accent-2"></div>

                        <div class="about-card-header">
                            <div class="about-card-icon about-card-icon-vision">
                                <i class="fas fa-star"></i>
                            </div>
                            <h3 class="about-card-title">Visi Kami</h3>
                        </div>

                        <p class="about-card-text">
                            Menjadi perusahaan konstruksi terkemuka di Indonesia yang diakui atas
                            dedikasi luar biasa terhadap kualitas, keberlanjutan lingkungan, dan
                            penciptaan nilai jangka panjang untuk semua stakeholder kami.
                        </p>

                        <div class="about-card-footer">
                            <span class="about-card-badge">Aspirasi Kami</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         VALUES SECTION - Core Principles Grid
         ====================================================== --}}
    <section class="about-values">
        <div class="about-values-bg-accent"></div>

        <div class="container">
            <div class="row g-4">

                <div class="col-12">
                    <div class="about-section-header" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                        <span class="about-section-label">
                            <i class="fas fa-heart"></i> Fondasi Bisnis
                        </span>
                        <h2 class="about-section-title">Nilai-Nilai Inti Kami</h2>
                        <p class="about-section-subtitle">Prinsip-prinsip yang memandu setiap keputusan, tindakan, dan interaksi kami</p>
                    </div>
                </div>

                {{-- VALUE: INTEGRITAS --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-value-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <div class="about-value-number">01</div>
                        <div class="about-value-icon about-value-icon-1">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3 class="about-value-title">Integritas</h3>
                        <p class="about-value-text">
                            Kami berkomitmen pada kejujuran dan transparansi absolut dalam setiap
                            aspek bisnis dan hubungan dengan klien, mitra, dan stakeholder.
                        </p>
                        <div class="about-value-accent"></div>
                    </div>
                </div>

                {{-- VALUE: INOVASI --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-value-card" data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">
                        <div class="about-value-number">02</div>
                        <div class="about-value-icon about-value-icon-2">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="about-value-title">Inovasi</h3>
                        <p class="about-value-text">
                            Kami terus mencari dan mengimplementasikan cara baru yang lebih efisien,
                            efektif, dan berkelanjutan untuk melayani klien dengan solusi konstruksi modern.
                        </p>
                        <div class="about-value-accent"></div>
                    </div>
                </div>

                {{-- VALUE: KEUNGGULAN --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-value-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        <div class="about-value-number">03</div>
                        <div class="about-value-icon about-value-icon-3">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3 class="about-value-title">Keunggulan</h3>
                        <p class="about-value-text">
                            Standar kualitas tertinggi dan performa superior adalah komitmen kami
                            dalam setiap detail pekerjaan konstruksi yang kami kelola.
                        </p>
                        <div class="about-value-accent"></div>
                    </div>
                </div>

                {{-- VALUE: KESELAMATAN --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-value-card" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                        <div class="about-value-number">04</div>
                        <div class="about-value-icon about-value-icon-4">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="about-value-title">Keselamatan</h3>
                        <p class="about-value-text">
                            Kesehatan dan keselamatan kerja adalah prioritas utama dan fundamental
                            di setiap proyek konstruksi yang kami kelola.
                        </p>
                        <div class="about-value-accent"></div>
                    </div>
                </div>

                {{-- VALUE: KEBERLANJUTAN --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-value-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <div class="about-value-number">05</div>
                        <div class="about-value-icon about-value-icon-5">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h3 class="about-value-title">Keberlanjutan</h3>
                        <p class="about-value-text">
                            Kami berkomitmen pada praktik konstruksi berkelanjutan yang ramah
                            lingkungan dan tanggung jawab sosial perusahaan jangka panjang.
                        </p>
                        <div class="about-value-accent"></div>
                    </div>
                </div>

                {{-- VALUE: KOLABORASI --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="about-value-card" data-aos="fade-up" data-aos-delay="350" data-aos-duration="700">
                        <div class="about-value-number">06</div>
                        <div class="about-value-icon about-value-icon-6">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="about-value-title">Kolaborasi</h3>
                        <p class="about-value-text">
                            Kerjasama tim yang solid, sinergi efektif, dan kemitraan strategis
                            adalah kunci kesuksesan setiap proyek kami.
                        </p>
                        <div class="about-value-accent"></div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         TEAM EXPERTISE SECTION - Professional Credentials
         ====================================================== --}}
    <section class="about-expertise">
        <div class="about-expertise-gradient-bg"></div>

        <div class="container">
            <div class="row g-5 align-items-center">

                {{-- EXPERTISE TEXT --}}
                <div class="col-12 col-lg-6">
                    <div class="about-expertise-content">
                        <span class="about-section-label" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                            <i class="fas fa-users"></i> Tim Profesional
                        </span>

                        <h2 class="about-expertise-title" data-aos="fade-up" data-aos-delay="50" data-aos-duration="700">
                            Talenta Terbaik di Industri
                        </h2>

                        <p class="about-expertise-intro" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                            Tim kami terdiri dari para profesional bersertifikat internasional dengan
                            pengalaman puluhan tahun di industri konstruksi. Setiap anggota tim membawa
                            keahlian spesialisasi unik yang berkontribusi pada kesuksesan luar biasa
                            setiap proyek yang kami kelola.
                        </p>

                        <div class="about-expertise-list" data-aos="fade-up" data-aos-delay="150" data-aos-duration="700">

                            <div class="about-expertise-item">
                                <div class="about-expertise-icon">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <div>
                                    <h4 class="about-expertise-item-title">Pengalaman Teknis yang Mendalam</h4>
                                    <p class="about-expertise-item-text">Tim berpengalaman puluhan tahun dengan pemahaman mendalam tentang konstruksi gedung dan infrastruktur industri</p>
                                </div>
                            </div>

                            <div class="about-expertise-item">
                                <div class="about-expertise-icon">
                                    <i class="fas fa-shield-alt"></i>
                                </div>
                                <div>
                                    <h4 class="about-expertise-item-title">Komitmen Keselamatan Kerja</h4>
                                    <p class="about-expertise-item-text">Prioritas utama pada keselamatan kerja dengan protokol ketat dan budaya safety-first di setiap proyek</p>
                                </div>
                            </div>

                            <div class="about-expertise-item">
                                <div class="about-expertise-icon">
                                    <i class="fas fa-cogs"></i>
                                </div>
                                <div>
                                    <h4 class="about-expertise-item-title">Metodologi Kerja Terbukti</h4>
                                    <p class="about-expertise-item-text">Proses kerja terstruktur dan terbukti efektif melalui puluhan tahun pengalaman lapangan praktis</p>
                                </div>
                            </div>

                            <div class="about-expertise-item">
                                <div class="about-expertise-icon">
                                    <i class="fas fa-chart-line"></i>
                                </div>
                                <div>
                                    <h4 class="about-expertise-item-title">Manajemen Proyek Profesional</h4>
                                    <p class="about-expertise-item-text">Sistem manajemen proyek terstruktur dengan track record on-time dan on-budget delivery</p>
                                </div>
                            </div>

                        </div>

                        <a wire:navigate href="/proyek" class="about-btn about-btn-primary" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                            <span>Lihat Portofolio Proyek</span>
                            <svg class="about-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M5 12h14M12 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>

                {{-- EXPERTISE IMAGE --}}
                <div class="col-12 col-lg-6">
                    <div class="about-expertise-visual" data-aos="fade-in-left" data-aos-delay="100" data-aos-duration="800">
                        <div class="about-expertise-image-wrapper">
                            <div class="about-expertise-image-bg"></div>
                            <img src="/images/home/hero-project.jpg"
                                 alt="Tim profesional PT Jaya Abadi Konstruksi di lapangan"
                                 class="about-expertise-image"
                                 loading="lazy">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         ACHIEVEMENTS SECTION - Stats & Awards
         ====================================================== --}}
    <section class="about-achievements">
        <div class="about-achievements-bg-pattern"></div>

        <div class="container">
            <div class="row g-4">

                <div class="col-12">
                    <div class="about-section-header" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                        <span class="about-section-label">
                            <i class="fas fa-medal"></i> Kesuksesan Kami
                        </span>
                        <h2 class="about-section-title">Pencapaian & Penghargaan</h2>
                        <p class="about-section-subtitle">Bukti nyata dari dedikasi dan keunggulan kami dalam industri konstruksi</p>
                    </div>
                </div>

                {{-- ACHIEVEMENT: PROJECTS --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="about-achievement-card" data-aos="zoom-in" data-aos-delay="100" data-aos-duration="600">
                        <div class="about-achievement-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="about-achievement-counter">
                            <span class="about-achievement-number" data-target="500">0</span>
                            <span class="about-achievement-symbol">+</span>
                        </div>
                        <div class="about-achievement-label">Proyek Selesai</div>
                        <p class="about-achievement-description">Beragam proyek dari berbagai skala dan industri</p>
                    </div>
                </div>

                {{-- ACHIEVEMENT: EXPERIENCE --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="about-achievement-card" data-aos="zoom-in" data-aos-delay="150" data-aos-duration="600">
                        <div class="about-achievement-icon">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="about-achievement-counter">
                            <span class="about-achievement-number" data-target="10">0</span>
                            <span class="about-achievement-symbol">+</span>
                        </div>
                        <div class="about-achievement-label">Tahun Pengalaman</div>
                        <p class="about-achievement-description">Pertumbuhan konsisten sejak tahun 2013</p>
                    </div>
                </div>

                {{-- ACHIEVEMENT: SATISFACTION --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="about-achievement-card" data-aos="zoom-in" data-aos-delay="200" data-aos-duration="600">
                        <div class="about-achievement-icon">
                            <i class="fas fa-grin-stars"></i>
                        </div>
                        <div class="about-achievement-counter">
                            <span class="about-achievement-number" data-target="98">0</span>
                            <span class="about-achievement-symbol">%</span>
                        </div>
                        <div class="about-achievement-label">Kepuasan Klien</div>
                        <p class="about-achievement-description">Rating tertinggi dari klien korporat kami</p>
                    </div>
                </div>

                {{-- ACHIEVEMENT: TEAM --}}
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="about-achievement-card" data-aos="zoom-in" data-aos-delay="250" data-aos-duration="600">
                        <div class="about-achievement-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <div class="about-achievement-counter">
                            <span class="about-achievement-number" data-target="50">0</span>
                            <span class="about-achievement-symbol">+</span>
                        </div>
                        <div class="about-achievement-label">Tim Profesional</div>
                        <p class="about-achievement-description">Tenaga terampil dan bersertifikat internasional</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- ======================================================
         CTA SECTION - Call to Action with Gradient
         ====================================================== --}}
    <section class="about-cta">
        <div class="about-cta-bg-decoration"></div>

        <div class="container">
            <div class="row g-4 align-items-center">

                <div class="col-12 col-lg-8">
                    <div class="about-cta-content" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                        <h2 class="about-cta-title">
                            Siap untuk Memulai Proyek Anda?
                        </h2>
                        <p class="about-cta-text">
                            Hubungi tim ahli kami hari ini dan mari kita diskusikan bagaimana
                            PT Jaya Abadi Konstruksi dapat membantu mewujudkan visi dan impian
                            konstruksi Anda dengan solusi inovatif dan berkualitas tinggi.
                        </p>

                        <div class="about-cta-features" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                            <div class="about-cta-feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Konsultasi gratis tanpa komitmen</span>
                            </div>
                            <div class="about-cta-feature-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Respons cepat dalam 24 jam</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-4">
                    <div class="about-cta-actions" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <a wire:navigate href="/kontak" class="about-btn about-btn-primary about-btn-lg about-btn-full">
                            <span>Hubungi Kami Sekarang</span>
                            <svg class="about-btn-icon" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24">
                                <path d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                            </svg>
                        </a>

                        <div class="about-cta-secondary">
                            <a wire:navigate href="/" class="about-cta-link">
                                <i class="fas fa-arrow-left"></i>
                                <span>Kembali ke Home</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</section>

@vite(['resources/js/pages/about/about-page.js'])
