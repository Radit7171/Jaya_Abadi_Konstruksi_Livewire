{{--
|--------------------------------------------------------------------------
| CONTACT PAGE — PT JAYA ABADI KONSTRUKSI
|--------------------------------------------------------------------------
| FINAL RULES (JANGAN DILANGGAR):
| - Blade = MARKUP ONLY
| - TIDAK ADA:
|   - inline style
|   - inline script
|   - JS behavior
|   - business logic
|
| - Semua class DI-SCOPE dengan prefix "contact-"
| - Semua styling ada di contact-page.css
| - Semua behavior ada di contact-page.js
| - Gunakan wire:navigate untuk SPA navigation
|--------------------------------------------------------------------------
--}}

<section class="contact-page">

    {{-- ======================================================
         BREADCRUMB NAVIGATION
         ====================================================== --}}
    <nav class="contact-breadcrumb" aria-label="Navigasi breadcrumb" data-aos="fade-in" data-aos-delay="0" data-aos-duration="500">
        <div class="container">
            <ol class="contact-breadcrumb-list">
                <li><a wire:navigate href="/" class="contact-breadcrumb-link">Home</a></li>
                <li><span class="contact-breadcrumb-current">Hubungi Kami</span></li>
            </ol>
        </div>
    </nav>

    {{-- ======================================================
         CONTACT HERO SECTION
         ====================================================== --}}
    <section class="contact-hero">
        <div class="contact-hero-decoration contact-hero-decoration-top"></div>

        <div class="container">
            <div class="row align-items-center g-5">

                {{-- HERO TEXT --}}
                <div class="col-12 col-lg-6">
                    <div class="contact-hero-badge" data-aos="fade-up" data-aos-delay="0" data-aos-duration="600">
                        <span class="contact-hero-badge-icon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="contact-hero-badge-text">Hubungi Kami</span>
                    </div>

                    <h1 class="contact-hero-title" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        Siap Membantu
                        <span class="contact-hero-highlight">Proyek Anda</span>
                    </h1>

                    <p class="contact-hero-subtitle" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        Tim ahli kami siap memberikan solusi terbaik untuk kebutuhan konstruksi Anda.
                        Hubungi kami sekarang untuk konsultasi gratis dan penawaran eksklusif.
                    </p>

                    {{-- Quick Contact Info --}}
                    <div class="contact-hero-info" data-aos="fade-up" data-aos-delay="250" data-aos-duration="700">
                        <div class="contact-info-item">
                            <span class="contact-info-icon">
                                <i class="fas fa-phone"></i>
                            </span>
                            <div class="contact-info-content">
                                <span class="contact-info-label">Telepon</span>
                                <a href="javascript:void(0)" class="external-link" data-link="tel:+6287817695973">
                                    +62 878 1769 5973
                                </a>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <span class="contact-info-icon">
                                <i class="fas fa-envelope"></i>
                            </span>
                            <div class="contact-info-content">
                                <span class="contact-info-label">Email</span>
                                <a href="javascript:void(0)" class="external-link" data-link="mailto:lasjayaabadi123@gmail.com">
                                    lasjayaabadi123@gmail.com
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Hero CTA --}}
                    <div class="contact-hero-actions" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <a href="javascript:void(0)" class="external-link contact-btn contact-btn-primary" data-link="https://wa.me/6287817695973" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i>
                            <span>Chat WhatsApp</span>
                        </a>
                        <a wire:navigate href="/layanan" class="contact-btn contact-btn-outline">
                            <span>Lihat Layanan</span>
                        </a>
                    </div>
                </div>

                {{-- HERO IMAGE --}}
                <div class="col-12 col-lg-6">
                    <div class="contact-hero-visual" data-aos="fade-in-left" data-aos-delay="200" data-aos-duration="800">
                        <div class="contact-hero-image-wrapper">
                            <div class="contact-hero-image-bg"></div>
                            <img src="/images/home/hero-project.jpg"
                                 alt="Tim customer service PT Jaya Abadi Konstruksi siap membantu Anda"
                                 class="contact-hero-image"
                                 loading="eager">
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="contact-hero-decoration contact-hero-decoration-bottom"></div>
    </section>

    {{-- ======================================================
         CONTACT INFO SECTION
         ====================================================== --}}
    <section class="contact-info-section">
        <div class="container">
            <div class="contact-info-section-header" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                <h2 class="contact-info-section-title">Hubungi Kami</h2>
                <p class="contact-info-section-subtitle">Pilih cara yang paling nyaman untuk menghubungi tim kami</p>
            </div>

            <div class="row g-4">
                {{-- Office Info --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="contact-info-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                        <div class="contact-info-card-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <h3 class="contact-info-card-title">Lokasi Kantor</h3>
                        <p class="contact-info-card-text">
                            Depan SD negeri, Jl. Raya Tapos <br> No.72 1, RT.01/RW.03, Cimpaeun, <br> Kec. Tapos, Kota Depok,<br> Jawa Barat 16459
                        </p>
                    </div>
                </div>

                {{-- Phone Info --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="contact-info-card" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                        <div class="contact-info-card-icon">
                            <i class="fas fa-phone"></i>
                        </div>
                        <h3 class="contact-info-card-title">Telepon</h3>
                        <p class="contact-info-card-text">
                            <a href="javascript:void(0)" class="external-link" data-link="tel:+6287817695973">
                                +62 878 1769 5973
                            </a>
                        </p>
                    </div>
                </div>

                {{-- Email Info --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="contact-info-card" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                        <div class="contact-info-card-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3 class="contact-info-card-title">Email</h3>
                        <p class="contact-info-card-text">
                            <a href="javascript:void(0)" class="external-link" data-link="mailto:lasjayaabadi123@gmail.com">
                                lasjayaabadi123@gmail.com
                            </a>
                        </p>
                    </div>
                </div>

                {{-- Business Hours --}}
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="contact-info-card" data-aos="fade-up" data-aos-delay="400" data-aos-duration="700">
                        <div class="contact-info-card-icon">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h3 class="contact-info-card-title">Jam Operasional</h3>
                        <p class="contact-info-card-text">
                            Setiap Hari<br>
                            08:00 - 17:00 WIB
                        </p>
                    </div>
                </div>
            </div>

            {{-- Social Media & Quick Actions --}}
            <div class="contact-quick-actions" data-aos="fade-up" data-aos-delay="500" data-aos-duration="700">
                <div class="contact-social-card">
                    <h3 class="contact-social-title">Hubungi Kami Melalui</h3>
                    <div class="contact-social-links">
                        <a href="javascript:void(0)" class="external-link contact-social-link contact-social-link-whatsapp" data-link="https://wa.me/6287817695973" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                        <a href="javascript:void(0)" class="external-link contact-social-link" data-link="https://instagram.com" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                        <a href="javascript:void(0)" class="external-link contact-social-link" data-link="https://facebook.com" rel="noopener noreferrer">
                            <i class="fab fa-facebook"></i>
                            <span>Facebook</span>
                        </a>
                        <a href="javascript:void(0)" class="external-link contact-social-link" data-link="https://linkedin.com" rel="noopener noreferrer">
                            <i class="fab fa-linkedin"></i>
                            <span>LinkedIn</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================
         MAPS SECTION
         ====================================================== --}}
    <section class="contact-maps">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                {{-- Maps Column --}}
                <div class="col-12 col-lg-7">
                    <div class="contact-maps-wrapper" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                        <div class="contact-maps-container">
                            <iframe
                                class="contact-maps-iframe"
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247.7885059560496!2d106.87467027809198!3d-6.443315312310418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69edd4373a1473%3A0x6dbcd5444d3a5113!2sJaya%20Abadi%20Konstruksi!5e0!3m2!1sid!2sid!4v1767517515995!5m2!1sid!2sid"
                                width="100%"
                                height="100%"
                                style="border:0;"
                                allowfullscreen=""
                                loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>

                {{-- Location Info Column --}}
                <div class="col-12 col-lg-5">
                    <div class="contact-maps-info">
                        <div class="contact-maps-info-header" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                            <h2 class="contact-maps-title">Kunjungi Kami</h2>
                            <p class="contact-maps-subtitle">Lokasi kantor kami yang strategis dan mudah dijangkau</p>
                        </div>

                        {{-- Main Location Card --}}
                        <div class="contact-maps-location-card" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                            <div class="contact-maps-location-header">
                                <span class="contact-maps-location-badge">Kantor Pusat</span>
                            </div>

                            <div class="contact-maps-location-body">
                                <div class="contact-maps-location-item">
                                    <span class="contact-maps-location-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <div class="contact-maps-location-content">
                                        <span class="contact-maps-location-label">Alamat</span>
                                        <p class="contact-maps-location-text">
                                            Depan SD negeri, Jl. Raya Tapos No.72 1, RT.01/RW.03, Cimpaeun, Kec. Tapos, Kota Depok, Jawa Barat 16459
                                        </p>
                                    </div>
                                </div>

                                <div class="contact-maps-location-item">
                                    <span class="contact-maps-location-icon">
                                        <i class="fas fa-clock"></i>
                                    </span>
                                    <div class="contact-maps-location-content">
                                        <span class="contact-maps-location-label">Jam Operasional</span>
                                        <p class="contact-maps-location-text">
                                            Setiap Hari<br>
                                            08:00 - 17:00 WIB
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="contact-maps-location-actions">
                                <a href="javascript:void(0)" class="external-link contact-maps-btn contact-maps-btn-primary" data-link="https://maps.app.goo.gl/4UxsTT3GsyskEiFw9" rel="noopener noreferrer">
                                    <i class="fas fa-directions"></i>
                                    <span>Arah Jalan</span>
                                </a>
                                <a href="javascript:void(0)" class="external-link contact-maps-btn contact-maps-btn-secondary" data-link="https://wa.me/6287817695973" rel="noopener noreferrer">
                                    <i class="fab fa-whatsapp"></i>
                                    <span>Hubungi</span>
                                </a>
                            </div>
                        </div>

                        {{-- Quick Info --}}
                        <div class="contact-maps-quick-info" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                            <div class="contact-maps-quick-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Lokasi strategis</span>
                            </div>
                            <div class="contact-maps-quick-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Mudah diakses dari berbagai arah</span>
                            </div>
                            <div class="contact-maps-quick-item">
                                <i class="fas fa-check-circle"></i>
                                <span>Parkir luas tersedia gratis</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================
         FAQ SECTION
         ====================================================== --}}
    <section class="contact-faq">
        <div class="container">
            <div class="contact-faq-header" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                <span class="contact-section-label">
                    <i class="fas fa-question-circle"></i> Pertanyaan Umum
                </span>
                <h2 class="contact-faq-title">FAQ - Jawaban untuk Pertanyaan Anda</h2>
                <p class="contact-faq-subtitle">Temukan jawaban cepat untuk pertanyaan yang sering diajukan</p>
            </div>

            <div class="contact-faq-items">
                {{-- FAQ Item 1 --}}
                <div class="contact-faq-item" data-aos="fade-up" data-aos-delay="100" data-aos-duration="700">
                    <div class="contact-faq-question">
                        <span class="contact-faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        <h3 class="contact-faq-question-text">Berapa lama waktu respon Anda?</h3>
                    </div>
                    <div class="contact-faq-answer">
                        <p>Tim kami berkomitmen merespons setiap inquiry dalam waktu maksimal 24 jam. Untuk pertanyaan mendesak, hubungi kami melalui WhatsApp atau telepon langsung.</p>
                    </div>
                </div>

                {{-- FAQ Item 2 --}}
                <div class="contact-faq-item" data-aos="fade-up" data-aos-delay="200" data-aos-duration="700">
                    <div class="contact-faq-question">
                        <span class="contact-faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        <h3 class="contact-faq-question-text">Apakah konsultasi awal gratis?</h3>
                    </div>
                    <div class="contact-faq-answer">
                        <p>Ya, konsultasi awal dengan tim kami sepenuhnya gratis. Kami akan memahami kebutuhan Anda dan memberikan saran terbaik sesuai dengan budget dan timeline.</p>
                    </div>
                </div>

                {{-- FAQ Item 3 --}}
                <div class="contact-faq-item" data-aos="fade-up" data-aos-delay="300" data-aos-duration="700">
                    <div class="contact-faq-question">
                        <span class="contact-faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        <h3 class="contact-faq-question-text">Di mana lokasi proyek yang bisa kami tangani?</h3>
                    </div>
                    <div class="contact-faq-answer">
                        <p>Kami melayani proyek di seluruh Indonesia. Tim kami memiliki pengalaman menangani proyek di berbagai wilayah dengan infrastruktur yang lengkap.</p>
                    </div>
                </div>

                {{-- FAQ Item 4 --}}
                <div class="contact-faq-item" data-aos="fade-up" data-aos-delay="400" data-aos-duration="700">
                    <div class="contact-faq-question">
                        <span class="contact-faq-icon">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                        <h3 class="contact-faq-question-text">Apakah ada garansi untuk proyek?</h3>
                    </div>
                    <div class="contact-faq-answer">
                        <p>Tentu saja! Semua proyek kami dilengkapi dengan garansi workmanship sesuai dengan terms & conditions yang telah disepakati. Kami juga menyediakan after-sales service.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ======================================================
         CTA SECTION
         ====================================================== --}}
    <section class="contact-cta">
        <div class="contact-cta-bg-pattern"></div>

        <div class="container">
            <div class="contact-cta-content" data-aos="fade-up" data-aos-delay="0" data-aos-duration="700">
                <h2 class="contact-cta-title">Siap Memulai Proyek Anda?</h2>
                <p class="contact-cta-subtitle">Hubungi kami hari ini dan dapatkan konsultasi gratis dari tim expert kami</p>

                <div class="contact-cta-actions">
                    <a href="javascript:void(0)" class="external-link contact-btn contact-btn-white" data-link="https://wa.me/6287817695973" rel="noopener noreferrer">
                        <i class="fab fa-whatsapp"></i>
                        <span>Chat WhatsApp</span>
                    </a>
                    <a wire:navigate href="/layanan" class="contact-btn contact-btn-outline-white">
                        <span>Lihat Layanan</span>
                    </a>
                </div>

                <p class="contact-cta-footer">
                    <i class="fas fa-shield-alt"></i>
                    Kami menjamin respons cepat dan solusi terbaik untuk kebutuhan Anda
                </p>
            </div>
        </div>
    </section>

</section>
