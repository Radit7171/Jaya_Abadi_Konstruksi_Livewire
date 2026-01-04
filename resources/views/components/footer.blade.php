{{-- Main Footer Component --}}
<footer class="site-footer" role="contentinfo">
    <div class="container px-3 px-md-4">
        {{-- Top Section --}}
        <div class="footer-top py-4 py-lg-5">
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
                            <x-footer.links
                                title="Link Cepat"
                                :links="[
                                    ['url' => '/', 'label' => 'Home'],
                                    ['url' => '/tentang-kami', 'label' => 'Tentang Kami'],
                                    ['url' => '/layanan', 'label' => 'Layanan'],
                                    ['url' => '/proyek', 'label' => 'Proyek'],
                                    ['url' => '/kontak', 'label' => 'Kontak'],
                                ]"
                            />
                        </div>

                        {{-- Services --}}
                        <div class="col-md-4">
                            <x-footer.links
                                title="Layanan"
                                :links="[
                                    ['url' => '/layanan#konstruksi-gedung', 'label' => 'Konstruksi Gedung'],
                                    ['url' => '/layanan#infrastruktur', 'label' => 'Infrastruktur'],
                                    ['url' => '/layanan#renovasi', 'label' => 'Renovasi & Perawatan'],
                                    ['url' => '/layanan#quality-assurance', 'label' => 'Quality Assurance'],
                                    ['url' => '/layanan#maintenance-support', 'label' => 'Maintenance & Support'],
                                    ['url' => '/layanan#supply-management', 'label' => 'Supply & Management'],
                                ]"
                            />
                        </div>

                        {{-- Contact --}}
                        <div class="col-md-4">
                            <x-footer.contact />
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
        <div class="footer-bottom py-3 border-top">
            <div class="row align-items-center">
                {{-- Copyright --}}
                <div class="col-12 col-md-6 mb-3 mb-md-0">
                    <x-footer.copyright />
                </div>

                {{-- Social Media --}}
                <div class="col-12 col-md-6">
                    <x-footer.social />
                </div>
            </div>
        </div>
    </div>
</footer>
