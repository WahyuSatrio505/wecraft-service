<!DOCTYPE html>
<html lang="id" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WeCraft Agency | High-End Web Solutions</title>
    
    <!-- Fonts: Outfit (Modern & Geometri) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles.css">
    <link rel="stylesheet" href="./assets/dashboard.css">
    <link rel="stylesheet" href="./assets/bagianSPesifikasi.css">



    <!-- mulai daari sni -->
</head>
<body>

    <!-- Background FX -->
    <div class="ambient-light"></div>
    <div class="grid-lines"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="navbar">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="#">
                <div class="bg-primary rounded-3 p-1 d-flex justify-content-center align-items-center" style="width:35px; height:35px;">
                    <i class="bi bi-code-square text-white"></i>
                </div>
                <span>WeCraft<span class="text-primary">.</span></span>
            </a>
            <button class="navbar-toggler border-0 shadow-none text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <i class="bi bi-list fs-2"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="#home">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Kenapa Kami?</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#pricing">Harga</a></li>
                    <li class="nav-item"><a class="nav-link" href="#ai-lab">AI Lab <span class="badge bg-primary ms-1" style="font-size: 0.6rem;">BETA</span></a></li>
                </ul>
                <div class="d-flex gap-3">
                    <a href="portfolio.php" class="btn btn-outline-light rounded-pill px-4 btn-sm d-flex align-items-center">Portofolio</a>
                    <a href="register.php" class="btn btn-glow btn-sm d-flex align-items-center">Mulai Project</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="min-vh-100 d-flex align-items-center position-relative pt-5">
        <div class="container mt-5">
            <div class="row align-items-center">
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill border border-white border-opacity-10 bg-primary bg-opacity-5 mb-4">
                        <span class="badge bg-success rounded-circle p-1"> </span>
                        <small class="text-muted fw-bold ls-1 text-warning">OPEN FOR PROJECTS</small>
                    </div>
                    <h1 class="hero-title mb-4">
                        We Build <span class="text-gradient typing-cursor" id="typing-text">Websites</span><br>
                        That Scale Business.
                    </h1>
                    <p class="lead text-muted mb-5 w-75">
                        Bukan sekadar coding. WeCraft menggabungkan <span class="text-white">Estetika Desain</span>, <span class="text-white">Psikologi User</span>, dan <span class="text-white">Teknologi Modern</span> untuk menciptakan website yang menjual.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#pricing" class="btn btn-glow btn-lg px-5">Lihat Paket</a>
                        <a href="#portfolio" class="btn btn-outline-light btn-lg px-5 rounded-pill">Demo Live <i class="bi bi-arrow-right ms-2"></i></a>
                    </div>

                    <!-- Tech Stack Marquee (Mini) -->
                    <div class="mt-5 pt-3 border-top border-white border-opacity-10">
                        <small class="text-muted d-block mb-3">POWERED BY MODERN STACK:</small>
                        <div class="d-flex gap-4 opacity-50 grayscale-hover transition-all">
                            <i class="bi bi-bootstrap fs-4" title="Bootstrap"></i>
                            <i class="bi bi-filetype-js fs-4" title="JavaScript"></i>
                            <i class="bi bi-wordpress fs-4" title="WordPress"></i>
                            <i class="bi bi-google fs-4" title="SEO"></i>
                            <i class="bi bi-robot fs-4" title="AI Integration"></i>
                        </div>
                    </div>
                </div>

               
                                <!-- Sisi Kanan: Slider Gambar Otomatis -->
                <div class="col-lg-5 hero-right-content">
                    <div class="position-relative">
                        <!-- Glow Dekoratif Latar Belakang -->
                        <div class="slider-glow"></div>
                        
                        <!-- Kontainer Utama Slider -->
                        <div class="slider-wrapper" data-aos="zoom-in" data-aos-duration="1200">
                            <!-- Kamu bisa ganti URL gambar di bawah ini sesuai keinginan -->
                            <img src="./img/1.jpg" class="slider-image active" alt="Proyek 1">
                            <img src="./img/2.jpg" class="slider-image" alt="Proyek 2">
                            <img src="./img/3.jpg" class="slider-image" alt="Proyek 3">
                            <img src="./img/4.jpg" class="slider-image" alt="Proyek 4">

                            <!-- Overlay Gradient -->
                            <div class="slider-overlay">
                                <div>
                                    <h5 class="fw-bold text-white mb-0">Crafted with Precision</h5>
                                    <small class="text-white-50">Our Latest Portfolio Showcase</small>
                                </div>
                            </div>

                            <!-- Indikator Dot -->
                            <div class="slider-dots">
                                <div class="dot active"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Live Stats Section -->
    <section class="py-5 border-top border-bottom border-white border-opacity-10 bg-black bg-opacity-20">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-6 col-md-3">
                    <h2 class="fw-bold text-white display-5 m-0 counter" data-target="75">0</h2>
                    <small class="text-accent text-uppercase ls-1">Project Terselesaikan</small>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="fw-bold text-white display-5 m-0 counter" data-target="1975">0</h2>
                    <small class="text-accent text-uppercase ls-1">Pengkodean Jam</small>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="fw-bold text-white display-5 m-0 counter" data-target="98">0</h2>
                    <small class="text-accent text-uppercase ls-1">Tingkat Kepuasan</small>
                </div>
                <div class="col-6 col-md-3">
                    <h2 class="fw-bold text-white display-5 m-0 counter" data-target="4.7">0</h2>
                    <small class="text-accent text-uppercase ls-1">Tahun Penggalaman</small>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Us (Bento Grid) -->
    <section id="about" class="py-5 my-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-6">
                    <span class="text-primary fw-bold text-uppercase ls-1">Kenapa WeCraft?</span>
                    <h2 class="display-5 fw-bold mt-2">Bukan Sekadar Website,<br>Ini Aset Digital.</h2>
                </div>
                <div class="col-lg-6 d-flex align-items-end">
                    <p class="text-muted lead">Kami paham sakit kepalanya ngurus website yang lemot dan jelek. Di sini, kami kasih standar baru.</p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Large Card -->
                <div class="col-lg-8" data-aos="fade-up">
                    <div class="bento-card d-flex flex-column flex-md-row align-items-center gap-4">
                        <div class="flex-grow-1">
                            <div class="icon-square"><i class="bi bi-speedometer2"></i></div>
                            <h3>Turbo Fast Loading</h3>
                            <p class="text-muted">Website lambat = Kehilangan Pelanggan. Kami optimasi kode hingga dapat skor Google PageSpeed 90+.</p>
                        </div>
                        <div class="bg-dark rounded-3 p-3 border border-white border-opacity-10" style="min-width: 200px;">
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-white">WeCraft</span>
                                <span class="text-success fw-bold">0.8s</span>
                            </div>
                            <div class="progress mb-3" style="height: 5px;"><div class="progress-bar bg-success" style="width: 90%"></div></div>
                            
                            <div class="d-flex justify-content-between mb-2">
                                <span class="text-muted">Lainnya</span>
                                <span class="text-danger fw-bold">4.2s</span>
                            </div>
                            <div class="progress" style="height: 5px;"><div class="progress-bar bg-danger" style="width: 30%"></div></div>
                        </div>
                    </div>
                </div>

                <!-- Small Card -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="bento-card">
                        <div class="icon-square"><i class="bi bi-shield-check"></i></div>
                        <h3>Security First</h3>
                        <p class="text-muted">Gratis SSL & Proteksi DDoS basic. Data pelanggan Anda aman.</p>
                    </div>
                </div>

                <!-- Small Card -->
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="bento-card">
                        <div class="icon-square"><i class="bi bi-phone"></i></div>
                        <h3>Mobile Obsessed</h3>
                        <p class="text-muted">Mobile-First Design yang adaptif. Layout ringan dan presisi, memastikan website tampil sempurna di berbagai ukuran layar smartphone.</p>
                    </div>
                </div>

                 <!-- Large Card -->
                 <div class="col-lg-8" data-aos="fade-up" data-aos-delay="300">
                    <div class="bento-card position-relative overflow-hidden">
                        <div class="position-relative z-1">
                            <div class="icon-square"><i class="bi bi-search"></i></div>
                            <h3>Scalable & Modular Architecture</h3>
                            <p class="text-muted w-75">Arsitektur kode modular berbasis Clean Code standar industri. Menjamin sistem tetap stabil saat trafik tinggi dan sangat mudah dikembangkan untuk jangka panjang.</p>
                        </div>
                        <i class="bi bi-graph-up text-white opacity-05 position-absolute" style="font-size: 15rem; right: -50px; bottom: -80px; transform: rotate(-10deg);"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services (Cards with Hover FX) -->
     <section id="services" class="py-5 position-relative" style="background: radial-gradient(circle at center, #1c232d 0%, #0f172a 100%);">
    <div class="container py-5">
        
        <!-- Header Section -->
        <div class="row mb-5 align-items-end">
            <div class="col-lg-6" data-aos="fade-right">
                <span class="text-primary fw-bold text-uppercase ls-1 small">Our Expertise</span>
                <h2 class="display-4 fw-bold text-white mt-2">Layanan Spesial <br><span class="text-primary">Untuk Bisnismu</span></h2>
            </div>
            <div class="col-lg-6 text-lg-end" data-aos="fade-left">
                <p class="text-muted w-75 ms-auto">Kami tidak hanya membuat website, kami membangun aset digital yang bekerja 24 jam untuk meningkatkan omzet Anda.</p>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="row g-4">
            
            <!-- Service 1: Landing Page -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="0">
                <div class="service-card-pro card-landing">
                    <div>
                        <div class="icon-wrapper-pro">
                            <i class="bi bi-lightning-charge-fill"></i>
                        </div>
                        <h3 class="text-white fw-bold mb-2">Landing Page</h3>
                        <p class="text-muted mb-4">Halaman tunggal fokus konversi (Sales Funnel). Cocok untuk iklan FB/IG Ads atau peluncuran produk baru.</p>
                        <div class="d-flex gap-2 mb-4 flex-wrap">
                            <span class="tech-badge">Fast Load</span>
                            <span class="tech-badge">Copywriting</span>
                            <span class="tech-badge">CTA Focus</span>
                        </div>
                    </div>
                    <button class="btn btn-detail-trigger" data-bs-toggle="modal" data-bs-target="#modalLandingPage">
                     Lihat Spesifikasi <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
            <!-- ini untuk spesifikai LP -->
             <div class="modal fade" id="modalLandingPage" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-content-premium text-white">
            <div class="modal-header border-0 pb-0 pt-4 px-4">
                <div>
                    <span class="badge bg-primary mb-2" style="font-size: 0.7rem;">CONVERSION ORIENTED</span>
                    <h4 class="modal-title fw-bold">Landing Page <span class="text-gradient-blue">Specification</span></h4>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-5">
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-cpu me-2 text-info"></i> Core Engine
                            </h6>
                            <div class="small text-muted mb-3">Dibangun untuk performa maksimal dengan skor optimasi tinggi.</div>
                            <ul class="list-unstyled">
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-lightning-fill text-warning me-2"></i> LCP < 1.2s (Ultra Fast Load)
                                </li>
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-shield-lock-fill text-success me-2"></i> SSL & Anti-Brute Force
                                </li>
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-search text-info me-2"></i> SEO Semantic Structure
                                </li>
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-phone text-primary me-2"></i> 100% Responsive Layout
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-7 border-start border-secondary border-opacity-25">
                        <h6 class="fw-bold mb-3 d-flex align-items-center">
                            <i class="bi bi-graph-up-arrow me-2 text-info"></i> Marketing & Sales Tools
                        </h6>
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="spec-feature-card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box-small me-3"><i class="bi bi-funnel"></i></div>
                                        <div>
                                            <div class="fw-bold small">Direct Sales Funnel</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">Navigasi tanpa hambatan untuk memandu user langsung ke tombol order.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="spec-feature-card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box-small me-3"><i class="bi bi-chat-dots"></i></div>
                                        <div>
                                            <div class="fw-bold small">CRM Integration</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">Integrasi otomatis ke WhatsApp, Email Marketing, atau Database.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="spec-feature-card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box-small me-3"><i class="bi bi-pie-chart"></i></div>
                                        <div>
                                            <div class="fw-bold small">Analytics Ready</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">Sudah termasuk pemasangan Google Analytics & FB Pixel.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-link text-white text-decoration-none btn-sm" data-bs-dismiss="modal">Nanti Saja</button>
            </div>
        </div>
    </div>
</div>
<!-- end 1 -->

            <!-- Service 2: Company Profile -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card-pro card-compro">
                    <div>
                        <div class="icon-wrapper-pro">
                            <i class="bi bi-buildings-fill"></i>
                        </div>
                        <h3 class="text-white fw-bold mb-2">Company Profile</h3>
                        <p class="text-muted mb-4">Wajah digital perusahaan yang profesional. Tingkatkan kepercayaan klien & mitra bisnis secara instan.</p>
                        <div class="d-flex gap-2 mb-4 flex-wrap">
                            <span class="tech-badge">Multi Page</span>
                            <span class="tech-badge">SEO Basic</span>
                            <span class="tech-badge">Email Bisnis</span>
                        </div>
                    </div>
                                        <button class="btn btn-detail-trigger" data-bs-toggle="modal" data-bs-target="#modalCompanyProfile">
                     Lihat Spesifikasi <i class="bi bi-arrow-right"></i>
                    </button>
                </div>
            </div>
            <!-- ini untuk CP -->
             <div class="modal fade" id="modalCompanyProfile" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-content-premium text-white">
            <div class="modal-header border-0 pb-0 pt-4 px-4">
                <div>
                    <span class="badge bg-info mb-2" style="font-size: 0.7rem;">CORPORATE IDENTITY</span>
                    <h4 class="modal-title fw-bold">Company Profile <span class="text-gradient-blue">Specification</span></h4>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-5">
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-layers me-2 text-info"></i> Architecture
                            </h6>
                            <div class="small text-muted mb-3">Struktur multi-halaman untuk informasi perusahaan yang komprehensif.</div>
                            <ul class="list-unstyled">
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-diagram-3-fill text-primary me-2"></i> Dynamic Multi-Page (Home, About, Services, etc)
                                </li>
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-envelope-at-fill text-success me-2"></i> Business Email Integration (name@company.com)
                                </li>
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-google text-warning me-2"></i> Google Maps & SEO Basic Setup
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-7 border-start border-secondary border-opacity-25">
                        <h6 class="fw-bold mb-3 d-flex align-items-center">
                            <i class="bi bi-award me-2 text-info"></i> Branding Tools
                        </h6>
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="spec-feature-card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box-small me-3"><i class="bi bi-images"></i></div>
                                        <div>
                                            <div class="fw-bold small">Premium Portfolio Gallery</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">Showcase hasil kerja atau proyek perusahaan dengan filter kategori.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="spec-feature-card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box-small me-3"><i class="bi bi-people"></i></div>
                                        <div>
                                            <div class="fw-bold small">Team & Careers Section</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">Kelola profil tim profesional dan informasi lowongan kerja aktif.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-link text-white text-decoration-none btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- end 2 -->

            <!-- Service 3: E-Commerce -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card-pro card-store">
                    <div>
                        <div class="icon-wrapper-pro">
                            <i class="bi bi-bag-check-fill"></i>
                        </div>
                        <h3 class="text-white fw-bold mb-2">Toko Online</h3>
                        <p class="text-muted mb-4">Katalog produk digital dengan sistem checkout otomatis. Jualan tanpa ribet balas chat satu per satu.</p>
                        <div class="d-flex gap-2 mb-4 flex-wrap">
                            <span class="tech-badge">Catalog</span>
                            <span class="tech-badge">Auto Ongkir</span>
                            <span class="tech-badge">Whatsapp API</span>
                        </div>
                    </div>
                    <button class="btn btn-detail-trigger" data-bs-toggle="modal" data-bs-target="#modalTokoOnline">
                     Lihat Spesifikasi <i class="bi bi-arrow-right"></i>
                </div>
            </div>
            <!-- untuk Tokline -->
             <div class="modal fade" id="modalTokoOnline" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content modal-content-premium text-white">
            <div class="modal-header border-0 pb-0 pt-4 px-4">
                <div>
                    <span class="badge bg-success mb-2" style="font-size: 0.7rem;">E-COMMERCE READY</span>
                    <h4 class="modal-title fw-bold">Toko Online <span class="text-gradient-blue">Specification</span></h4>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body p-4">
                <div class="row g-4">
                    <div class="col-md-5">
                        <div class="mb-4">
                            <h6 class="fw-bold mb-3 d-flex align-items-center">
                                <i class="bi bi-cart-check me-2 text-info"></i> Commerce Engine
                            </h6>
                            <div class="small text-muted mb-3">Sistem belanja otomatis yang bekerja 24 jam untuk bisnis Anda.</div>
                            <ul class="list-unstyled">
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-box-seam-fill text-warning me-2"></i> Inventory Management (Stok Otomatis)
                                </li>
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-truck text-primary me-2"></i> Auto Shipping (Integrasi RajaOngkir/API)
                                </li>
                                <li class="mb-2 d-flex align-items-center small">
                                    <i class="bi bi-credit-card-2-front-fill text-success me-2"></i> Payment Gateway (Midtrans Ready)
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-7 border-start border-secondary border-opacity-25">
                        <h6 class="fw-bold mb-3 d-flex align-items-center">
                            <i class="bi bi-lightning-charge me-2 text-info"></i> Sales Booster
                        </h6>
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="spec-feature-card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box-small me-3"><i class="bi bi-tags"></i></div>
                                        <div>
                                            <div class="fw-bold small">Flash Sale & Coupon System</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">Tingkatkan urgensi belanja dengan fitur diskon terbatas dan kupon.</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="spec-feature-card p-3">
                                    <div class="d-flex align-items-center">
                                        <div class="icon-box-small me-3"><i class="bi bi-whatsapp"></i></div>
                                        <div>
                                            <div class="fw-bold small">WhatsApp Checkout</div>
                                            <div class="text-muted" style="font-size: 0.75rem;">Kirim data pesanan langsung ke admin via WA (Tanpa ribet ketik ulang).</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer border-0 p-4 pt-0">
                <button type="button" class="btn btn-link text-white text-decoration-none btn-sm" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<!-- bagia end 3 -->

        </div>
    </div>
</section>

    <!-- Pricing (Interactive Switcher) -->
    <section id="pricing" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-5 mb-4">Investasi Transparan</h2>
                <!-- Switcher Logic handled by JS -->
                <div class="pricing-switch" id="pricingSwitch">
                    <div class="switch-bg"></div>
                    <div class="pricing-label active" onclick="switchPricing('one-time')">Sekali Bayar</div>
                    <div class="pricing-label" onclick="switchPricing('monthly')">Cicilan (3x)</div>
                </div>
            </div>

            <div class="row g-4 justify-content-center">
                <!-- Pricing Card 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="bento-card p-4">
                        <h4 class="text-muted mb-3">UMKM Starter</h4>
                        <h2 class="display-4 fw-bold mb-0 text-white price-text" data-one="450k" data-month="150k">Rp 450rb</h2>
                        <small class="text-muted d-block mb-4 billing-cycle">Bayar sekali, milik selamanya</small>
                        
                        <ul class="list-unstyled text-muted mb-4 d-flex flex-column gap-3">
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>1 Halaman (Landing Page)</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Gratis Domain .my.id</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Hosting Standar</li>
                            <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Tombol WA Order</li>
                        </ul>
                        <a href="checkout.php?paket=UMKM Starter&harga=450000" class="btn btn-outline-light w-100 rounded-pill py-2">Pilih Paket</a>
                    </div>
                </div>

                <!-- Pricing Card 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="bento-card p-4 border-glow position-relative">
                         <div class="position-absolute top-0 start-50 translate-middle badge bg-primary px-3 py-2 rounded-pill shadow-lg">BEST VALUE</div>
                        <h4 class="text-white mb-3">Business Pro</h4>
                        <h2 class="display-4 fw-bold mb-0 text-white price-text" data-one="900k" data-month="350k">Rp 900rb</h2>
                        <small class="text-muted d-block mb-4 billing-cycle">Bayar sekali, milik selamanya</small>
                        
                        <ul class="list-unstyled text-muted mb-4 d-flex flex-column gap-3">
                            <li><i class="bi bi-check-circle-fill text-accent me-2"></i>5 Halaman (Company Profile)</li>
                            <li><i class="bi bi-check-circle-fill text-accent me-2"></i>Gratis Domain .COM</li>
                            <li><i class="bi bi-check-circle-fill text-accent me-2"></i>Hosting Premium (Ngebut)</li>
                            <li><i class="bi bi-check-circle-fill text-accent me-2"></i>SEO Basic Setup</li>
                            <li><i class="bi bi-check-circle-fill text-accent me-2"></i>Akun Email Bisnis</li>
                        </ul>
                        <a href="checkout.php?paket=Business Pro&harga=900000" class="btn btn-glow w-100 py-2">Pilih Paket</a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- AI Lab Section (Feature Rich) -->
    <section id="ai-lab" class="py-5 position-relative overflow-hidden">
        <div class="container">
            <div class="bento-card bg-gradient-to-r from-gray-900 to-black p-5 border-glow">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <span class="badge bg-warning text-dark mb-3">AI POWERED</span>
                        <h2 class="fw-bold mb-3">Web Concept Generator 2.0</h2>
                        <p class="text-muted mb-4">Masih bingung mau bikin web seperti apa? Ketik ide bisnis Anda, dan AI kami akan membuatkan struktur sitemap dan rekomendasi fitur dalam hitungan detik.</p>
                        
                        <div class="form-floating mb-3">
                            <textarea class="form-control bg-dark text-white border-white border-opacity-10" placeholder="Ide Bisnis" id="aiInput" style="height: 100px"></textarea>
                            <label for="aiInput" class="text-muted">Contoh: Jualan sepatu custom lukis untuk remaja...</label>
                        </div>
                        <button onclick="generateAI()" class="btn btn-light rounded-pill px-4 fw-bold w-100">
                            <i class="bi bi-stars me-2 text-warning"></i>Generate Konsep
                        </button>
                    </div>
                    <div class="col-lg-6 mt-4 mt-lg-0">
                        <div class="bg-black bg-opacity-50 p-4 rounded-3 border border-white border-opacity-10" style="min-height: 250px;">
                            <div class="d-flex align-items-center gap-2 mb-3 border-bottom border-white border-opacity-10 pb-2">
                                <div class="spinner-border spinner-border-sm text-primary d-none" id="aiLoading" role="status"></div>
                                <span class="text-muted small fw-bold">TERMINAL OUTPUT_</span>
                            </div>
                            <div id="aiOutput" class="font-monospace small text-success">
                                <span class="opacity-50">// Hasil konsep akan muncul di sini...</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Frequently Asked Questions</h2>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion accordion-flush" id="faqAccordion">
                        <div class="accordion-item bg-transparent border-bottom border-white border-opacity-10">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    Apakah saya perlu mengerti coding untuk mengelola website?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Tidak perlu! Kami akan menyediakan dashboard admin yang mudah digunakan (seperti update status Facebook) atau kami bisa bantu kelola dengan paket maintenance.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-transparent border-bottom border-white border-opacity-10">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                    Berapa lama waktu pengerjaan?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Tergantung kompleksitas. Landing Page biasa selesai 3-5 hari. Company Profile 7-10 hari. Toko Online 14+ hari. Kami prioritaskan kualitas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item bg-transparent border-bottom border-white border-opacity-10">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed bg-transparent text-white shadow-none fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                    Apa yang terjadi setelah tahun pertama?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Anda hanya perlu memperpanjang Domain & Hosting. Biayanya terjangkau (sekitar 350rb - 700rb per tahun tergantung paket). Tidak ada biaya desain ulang.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <h3 class="fw-bold mb-3">WeCraft<span class="text-primary">.</span></h3>
                    <p class="text-muted">Inisiatif mahasiswa TI untuk Menggabungkan standar rekayasa perangkat lunak modern dengan strategi digital guna memastikan bisnis Anda tumbuh secara berkelanjutan</p>
                    <div class="d-flex gap-3 mt-4">
                        <a href="https://www.instagram.com/wecraft4433?igsh=a2F1MWhvcnBjZXkx" class="text-white fs-5"><i class="bi bi-instagram"></i></a>
                        <a href="https://github.com/WahyuSatrio505" class="text-white fs-5"><i class="bi bi-github"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <h5 class="fw-bold text-white mb-3">Layanan</h5>
                    <ul class="list-unstyled text-muted d-flex flex-column gap-2">
                        <li><a href="#" class="text-decoration-none text-muted">Web Development</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">UI/UX Design</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">SEO Audit</a></li>
                    </ul>
                </div>
                <div class="col-lg-2">
                    <h5 class="fw-bold text-white mb-3">Legal</h5>
                    <ul class="list-unstyled text-muted d-flex flex-column gap-2">
                        <li><a href="#" class="text-decoration-none text-muted">Privacy Policy</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Terms of Service</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Refund Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h5 class="fw-bold text-white mb-3">Kontak</h5>
                    <p class="text-muted mb-1">Surakarta, Jawa Tengah</p>
                    <p class="text-muted mb-1">PunyaKita@gmail.com</p>
                    <a href="https://wa.me/6288214728116" class="text-primary text-decoration-none fw-bold">+62 882-1472-8116</a>
                </div>
            </div>
            <div class="border-top border-white border-opacity-10 mt-5 pt-4 text-center text-muted small">
                &copy; 2026 WeCraft Agency. Coded with <i class="bi bi-heart-fill text-danger"></i> by PunyaKita.
            </div>
        </div>
    </footer>

    <!-- Floating Whatsapp -->
    <a href="https://wa.me/6288214728116?text=Halo%20WeCraft,%20saya%20mau%20konsultasi%20website" class="float-wa" target="_blank">
        <i class="bi bi-whatsapp"></i>
    </a>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="./assets/index.js"></script>
    <script src="./assets/apigen.js"></script>
    <script src="./assets/animasifoto.js"></script>

    <!-- end -->
</body>
</html>

