{{-- Main Footer Component --}}
<footer class="site-footer" role="contentinfo">
    <div class="container px-3 px-md-4">
        {{-- Top Section --}}
        <div class="footer-top">
            <div class="row gy-4">

                {{-- Brand --}}
                <div class="col-12 col-lg-4">
                    <x-footer.brand />
                </div>

                {{-- Desktop Links --}}
                <div class="col-12 col-lg-8 d-none d-lg-block">
                    <div class="row">
                        {{-- Quick Links --}}
                        <div class="col-md-4">
                            <h6 class="footer-section-title">Link Cepat</h6>
                            <ul class="list-unstyled mb-0">
                                <li><a href="/" wire:navigate class="footer-link">Home</a></li>
                                <li><a href="/tentang-kami" wire:navigate class="footer-link">Tentang Kami</a></li>
                                <li><a href="/layanan" wire:navigate class="footer-link">Layanan</a></li>
                                <li><a href="/proyek" wire:navigate class="footer-link">Proyek</a></li>
                                <li><a href="/kontak" wire:navigate class="footer-link">Kontak</a></li>
                                <li><a href="/login" wire:navigate class="footer-link">Login</a></li>
                            </ul>
                        </div>

                        {{-- Services --}}
                        <div class="col-md-4">
                            <h6 class="footer-section-title">Layanan</h6>
                            <ul class="list-unstyled mb-0">
                                <li><a href="/layanan#konstruksi-baja" wire:navigate class="footer-link">Konstruksi Baja</a></li>
                                <li><a href="/layanan#gedung-bertingkat" wire:navigate class="footer-link">Gedung Bertingkat</a></li>
                                <li><a href="/layanan#infrastruktur" wire:navigate class="footer-link">Infrastruktur Jalan</a></li>
                                <li><a href="/layanan#manajemen-proyek" wire:navigate class="footer-link">Manajemen Proyek</a></li>
                                <li><a href="/layanan#renovasi" wire:navigate class="footer-link">Renovasi & Perawatan</a></li>
                            </ul>
                        </div>

                        {{-- Contact --}}
                        <div class="col-md-4">
                            <h6 class="footer-section-title">Kontak Kami</h6>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon"><i class="fas fa-location-dot"></i></div>
                                <a href="javascript:void(0)" class="external-link footer-link p-0 text-start" data-link="https://maps.app.goo.gl/4UxsTT3GsyskEiFw9">
                                    Depan SD negeri, Jl. Raya Tapos No.72, Tapos, Kota Depok, Jawa Barat 16459
                                </a>
                            </div>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon"><i class="fas fa-phone"></i></div>
                                <a href="javascript:void(0)" class="external-link footer-link p-0" data-link="https://wa.me/6287817695973">
                                    +62 878 1769 5973
                                </a>
                            </div>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon"><i class="fas fa-envelope"></i></div>
                                <a href="javascript:void(0)" class="external-link footer-link p-0" data-link="mailto:lasjayaabadi123@gmail.com">
                                    lasjayaabadi123@gmail.com
                                </a>
                            </div>
                            <div class="footer-contact-item">
                                <div class="footer-contact-icon"><i class="fas fa-clock"></i></div>
                                <span class="footer-link p-0">Setiap Hari: 08:00 - 17:00 WIB</span>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- Mobile Accordion --}}
                <div class="col-12 d-lg-none">
                    <div class="mobile-footer-accordion">
                        {{-- Quick Links Accordion --}}
                        <div class="accordion-item border-0">
                            <div class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#quickLinksMobile">
                                    <span class="h6 fw-bold mb-0">Link Cepat & Layanan</span>
                                </button>
                            </div>
                            <div id="quickLinksMobile" class="accordion-collapse collapse">
                                <div class="accordion-body p-0 pt-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-4">
                                                <h6 class="small fw-bold mb-2">Link Cepat</h6>
                                                <ul class="list-unstyled mb-0">
                                                    <li><a href="/" wire:navigate class="small text-body-secondary d-block py-1">Home</a></li>
                                                    <li><a href="/tentang-kami" wire:navigate class="small text-body-secondary d-block py-1">Tentang Kami</a></li>
                                                    <li><a href="/layanan" wire:navigate class="small text-body-secondary d-block py-1">Layanan</a></li>
                                                    <li><a href="/proyek" wire:navigate class="small text-body-secondary d-block py-1">Proyek</a></li>
                                                    <li><a href="/kontak" wire:navigate class="small text-body-secondary d-block py-1">Kontak</a></li>
                                                    <li><a href="/login" wire:navigate class="small text-body-secondary d-block py-1">Login</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-4">
                                                <h6 class="small fw-bold mb-2">Layanan</h6>
                                                <ul class="list-unstyled mb-0">
                                                    <li><a href="/layanan#konstruksi-gedung" wire:navigate class="small text-body-secondary d-block py-1">Konstruksi Gedung</a></li>
                                                    <li><a href="/layanan#infrastruktur" wire:navigate class="small text-body-secondary d-block py-1">Infrastruktur</a></li>
                                                    <li><a href="/layanan#renovasi" wire:navigate class="small text-body-secondary d-block py-1">Renovasi & Perawatan</a></li>
                                                    <li><a href="/layanan#quality-assurance" wire:navigate class="small text-body-secondary d-block py-1">Quality Assurance</a></li>
                                                    <li><a href="/layanan#maintenance-support" wire:navigate class="small text-body-secondary d-block py-1">Maintenance & Support</a></li>
                                                    <li><a href="/layanan#supply-management" wire:navigate class="small text-body-secondary d-block py-1">Supply & Management</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Contact Accordion --}}
                        <div class="accordion-item border-0">
                            <div class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contactMobile">
                                    <span class="h6 fw-bold mb-0">Kontak Kami</span>
                                </button>
                            </div>
                            <div id="contactMobile" class="accordion-collapse collapse">
                                <div class="accordion-body p-0 pt-3">
                                    <x-footer.contact mobile="true" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Section --}}
        <div class="footer-bottom border-top">
            <div class="row align-items-center">
                {{-- Copyright & Theme --}}
                <div class="col-12 col-md-6 mb-2 mb-md-0">
                    <div class="d-flex align-items-center gap-3">
                        <p class="small text-muted mb-0" style="font-size: 0.8rem;">
                            &copy; {{ date('Y') }} Jaya Abadi Konstruksi. All rights reserved.
                        </p>
                        <div style="transform: scale(0.85); transform-origin: left;">
                            <x-theme-toggle />
                        </div>
                    </div>
                </div>


                {{-- Social Media --}}
                <div class="col-12 col-md-6">
                    <div class="d-flex justify-content-md-end gap-2">

                        <a href="#" class="social-icon" title="Facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="social-icon" title="Instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-icon" title="LinkedIn"><i class="fab fa-linkedin"></i></a>
                        <a href="https://wa.me/6287817695973" class="social-icon" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
