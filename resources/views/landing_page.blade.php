<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description"
            content="POSINAJA System - Solusi Point of Sale modern untuk bisnis retail dengan manajemen multi outlet, pelacakan inventori, dan pelaporan komprehensif. Software POS terbaik di Indonesia." />
        <meta name="keywords"
            content="POS System, Point of Sale, Software POS, Sistem Kasir, Manajemen Toko, Retail Software, POSINAJA, Multi Outlet, Inventory Management, Indonesia POS" />
        <meta name="author" content="Tim POSINAJA" />
        <meta name="robots" content="index, follow" />
        <meta name="language" content="Indonesian" />

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url('/') }}" />
        <meta property="og:title" content="POSINAJA System - Solusi Point of Sale Modern" />
        <meta property="og:description"
            content="Sistem POS terbaik untuk bisnis retail Indonesia. Kelola multi outlet, inventori, dan laporan dengan mudah." />
        <meta property="og:image" content="{{ url('/assets/posinaja-og-image.jpg') }}" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image" />
        <meta property="twitter:url" content="{{ url('/') }}" />
        <meta property="twitter:title" content="POSINAJA System - Solusi Point of Sale Modern" />
        <meta property="twitter:description"
            content="Sistem POS terbaik untuk bisnis retail Indonesia. Kelola multi outlet, inventori, dan laporan dengan mudah." />
        <meta property="twitter:image" content="{{ url('/assets/posinaja-twitter-image.jpg') }}" />

        <title>POSINAJA System - Solusi Point of Sale Modern | Software POS Terbaik Indonesia</title>

        <!-- Canonical URL -->
        <link rel="canonical" href="{{ url('/') }}" />

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- AOS Animation CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Custom Animations CSS -->
        <style>
            .fade-in-up {
                animation: fadeInUp 1s ease-out;
            }

            .fade-in-left {
                animation: fadeInLeft 1s ease-out 0.3s both;
            }

            .fade-in-right {
                animation: fadeInRight 1s ease-out 0.5s both;
            }

            .pulse-icon {
                animation: pulse 2s infinite;
            }

            .float-animation {
                animation: float 3s ease-in-out infinite;
            }

            .gradient-text {
                background: linear-gradient(45deg, #007bff, #28a745);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
            }

            .hover-scale {
                transition: transform 0.3s ease;
            }

            .hover-scale:hover {
                transform: scale(1.05);
            }

            .feature-icon {
                transition: all 0.3s ease;
            }

            .feature-icon:hover {
                transform: rotate(10deg) scale(1.1);
            }

            @keyframes fadeInUp {
                from {
                    opacity: 0;
                    transform: translateY(30px);
                }

                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            @keyframes fadeInLeft {
                from {
                    opacity: 0;
                    transform: translateX(-30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes fadeInRight {
                from {
                    opacity: 0;
                    transform: translateX(30px);
                }

                to {
                    opacity: 1;
                    transform: translateX(0);
                }
            }

            @keyframes pulse {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.1);
                }

                100% {
                    transform: scale(1);
                }
            }

            @keyframes float {
                0% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }

                100% {
                    transform: translateY(0px);
                }
            }

            .loading-dots {
                display: inline-block;
            }

            .loading-dots:after {
                content: '...';
                animation: dots 1.5s steps(4, end) infinite;
            }

            @keyframes dots {

                0%,
                20% {
                    color: rgba(0, 0, 0, 0);
                    text-shadow:
                        .25em 0 0 rgba(0, 0, 0, 0),
                        .5em 0 0 rgba(0, 0, 0, 0);
                }

                40% {
                    color: #007bff;
                    text-shadow:
                        .25em 0 0 rgba(0, 0, 0, 0),
                        .5em 0 0 rgba(0, 0, 0, 0);
                }

                60% {
                    text-shadow:
                        .25em 0 0 #007bff,
                        .5em 0 0 rgba(0, 0, 0, 0);
                }

                80%,
                100% {
                    text-shadow:
                        .25em 0 0 #007bff,
                        .5em 0 0 #007bff;
                }
            }
        </style>

        <!-- Structured Data for SEO -->
        <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "SoftwareApplication",
            "name": "POSINAJA System",
            "description": "Solusi Point of Sale modern untuk bisnis retail dengan manajemen multi outlet, pelacakan inventori, dan pelaporan komprehensif",
            "url": "{{ url('/') }}",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "Web-based",
            "offers": {
                "@type": "Offer",
                "price": "0",
                "priceCurrency": "IDR",
                "description": "Trial gratis tersedia"
            },
            "author": {
                "@type": "Organization",
                "name": "POSINAJA",
                "url": "{{ url('/') }}"
            },
            "featureList": [
                "Manajemen Multi-Outlet",
                "Kontrol Inventori Real-time",
                "Proses Pesanan Terintegrasi",
                "Akses Berbasis Role",
                "Laporan dan Analitik Komprehensif"
            ]
        }
        </script>
    </head>

    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top shadow-lg" data-aos="fade-down">
                <div class="container px-5">
                    <a class="navbar-brand fw-bold" href="/"><i class="bi bi-shop me-2 pulse-icon"></i>POSINAJA</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><span
                            class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link hover-scale" href="/">Beranda</a></li>
                            <li class="nav-item"><a class="nav-link hover-scale" href="/about">Tentang</a></li>
                            <li class="nav-item"><a class="nav-link hover-scale" href="#features">Fitur</a></li>
                            <li class="nav-item"><a class="btn btn-outline-light ms-2 hover-scale"
                                    href="/login">Masuk</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <!-- Header-->
            <header class="bg-primary py-5" style="margin-top: 80px;">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start" data-aos="fade-right" data-aos-delay="200">
                                <h1 class="display-5 fw-bolder text-white mb-2">Sistem POS Revolusioner
                                    untuk Bisnis
                                    Modern</h1>
                                <p class="lead fw-normal text-white-50 mb-4" data-aos="fade-up" data-aos-delay="400">
                                    Optimalkan operasional ritel Anda dengan
                                    sistem Point of Sale komprehensif kami. Kelola multiple outlet, lacak inventori,
                                    proses pesanan, dan buat laporan detail - semuanya dalam satu platform yang
                                    powerful!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start"
                                    data-aos="fade-up" data-aos-delay="600">
                                    <a class="btn btn-light btn-lg px-4 me-sm-3 hover-scale" href="/login">Mulai
                                        Sekarang</a>
                                    <a class="btn btn-outline-light btn-lg px-4 hover-scale" href="#features">Pelajari
                                        Lebih
                                        Lanjut</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center" data-aos="fade-left"
                            data-aos-delay="300">
                            <div class="bg-white rounded-3 p-4 shadow-lg my-5 float-animation">
                                <i class="bi bi-cash-stack text-primary pulse-icon" style="font-size: 4rem;"></i>
                                <div class="mt-3">
                                    <i class="bi bi-shop text-success me-3 feature-icon" style="font-size: 2rem;"></i>
                                    <i class="bi bi-graph-up text-warning me-3 feature-icon"
                                        style="font-size: 2rem;"></i>
                                    <i class="bi bi-people text-info feature-icon" style="font-size: 2rem;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-right">
                            <h2 class="fw-bolder mb-0">Mengapa Memilih POSINAJA?</h2>
                            <p class="text-muted mt-3">Dirancang khusus untuk bisnis ritel yang membutuhkan solusi point
                                of sale yang kuat, skalabel, dan user-friendly.</p>
                        </div>
                        <div class="col-lg-8">
                            <div class="row gx-5 row-cols-1 row-cols-md-2">
                                <div class="col mb-5 h-100" data-aos="zoom-in" data-aos-delay="100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 d-flex align-items-center justify-content-center feature-icon"
                                        style="width: 3rem; height: 3rem;">
                                        <i class="bi bi-shop"></i>
                                    </div>
                                    <h2 class="h5">Manajemen Multi-Outlet</h2>
                                    <p class="mb-0">Kelola multiple lokasi toko dari satu dashboard. Pantau performa,
                                        inventori, dan staff di semua outlet Anda dengan mudah.</p>
                                </div>
                                <div class="col mb-5 h-100" data-aos="zoom-in" data-aos-delay="200">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 d-flex align-items-center justify-content-center feature-icon"
                                        style="width: 3rem; height: 3rem;">
                                        <i class="bi bi-box-seam"></i>
                                    </div>
                                    <h2 class="h5">Kontrol Inventori</h2>
                                    <p class="mb-0">Pelacakan produk real-time dengan manajemen kategori. Pantau level
                                        stok, atur alert, dan pertahankan inventori optimal di semua lokasi.</p>
                                </div>
                                <div class="col mb-5 mb-md-0 h-100" data-aos="zoom-in" data-aos-delay="300">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 d-flex align-items-center justify-content-center feature-icon"
                                        style="width: 3rem; height: 3rem;">
                                        <i class="bi bi-receipt"></i>
                                    </div>
                                    <h2 class="h5">Proses Pesanan</h2>
                                    <p class="mb-0">Manajemen pesanan yang streamlined dengan tracking pesanan berjalan,
                                        selesai, dan dibatalkan. Generate invoice dan maintain riwayat pesanan
                                        komprehensif.</p>
                                </div>
                                <div class="col h-100" data-aos="zoom-in" data-aos-delay="400">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3 d-flex align-items-center justify-content-center feature-icon"
                                        style="width: 3rem; height: 3rem;">
                                        <i class="bi bi-people"></i>
                                    </div>
                                    <h2 class="h5">Akses Berbasis Role</h2>
                                    <p class="mb-0">Manajemen user yang aman dengan permission berbasis role. Kontrol
                                        level akses untuk berbagai staff dan maintain keamanan data.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Testimonial section-->
            <div class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7" data-aos="fade-up">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"POSINAJA telah merevolusi operasional ritel kami.
                                    Mengelola multiple toko tidak pernah semudah ini, dan pelaporan real-time memberikan
                                    kami insight yang tidak pernah kami miliki sebelumnya. Sangat direkomendasikan!"
                                </div>
                                <div class="d-flex align-items-center justify-content-center" data-aos="zoom-in"
                                    data-aos-delay="200">
                                    <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3 pulse-icon"
                                        style="width: 40px; height: 40px;">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <div class="fw-bold">
                                        Sarah Sari
                                        <span class="fw-bold text-primary mx-1">/</span>
                                        Manajer Toko, RetailMax
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Benefits section-->
            <section class="py-5">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <div class="text-center" data-aos="fade-up">
                                <h2 class="fw-bolder">Manfaat Utama</h2>
                                <p class="lead fw-normal text-muted mb-5">Temukan bagaimana POSINAJA dapat
                                    mentransformasi operasional bisnis Anda dan meningkatkan profitabilitas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col-lg-4 mb-5" data-aos="flip-left" data-aos-delay="100">
                            <div class="card h-100 shadow border-0 hover-scale">
                                <div class="card-body p-4 text-center">
                                    <div class="bg-primary bg-gradient text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center pulse-icon"
                                        style="width: 4rem; height: 4rem;">
                                        <i class="bi bi-lightning-charge-fill" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div class="mb-3">
                                        <i class="bi bi-speedometer2 text-primary me-2" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-clock text-success me-2" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-rocket text-warning" style="font-size: 1.2rem;"></i>
                                    </div>
                                    <h5 class="card-title mb-3">
                                        <i class="bi bi-lightning text-warning me-2"></i>
                                        Super Cepat
                                    </h5>
                                    <p class="card-text mb-0">
                                        <i class="bi bi-check-circle text-success me-1"></i>
                                        Proses transaksi dengan cepat dan efisien. Kurangi waktu
                                        tunggu pelanggan dan tingkatkan kualitas layanan dengan sistem yang optimal.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5" data-aos="flip-left" data-aos-delay="200">
                            <div class="card h-100 shadow border-0 hover-scale">
                                <div class="card-body p-4 text-center">
                                    <div class="bg-success bg-gradient text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center pulse-icon"
                                        style="width: 4rem; height: 4rem;">
                                        <i class="bi bi-shield" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div class="mb-3">
                                        <i class="bi bi-lock text-primary me-2" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-award text-warning me-2" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-patch-check text-success me-2" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-fingerprint text-info me-2" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-key text-danger" style="font-size: 1.2rem;"></i>
                                    </div>
                                    <h5 class="card-title mb-3">
                                        <i class="bi bi-shield-lock text-success me-2"></i>
                                        Aman & Handal
                                    </h5>
                                    <p class="card-text mb-0">
                                        <i class="bi bi-check-circle text-success me-1"></i>
                                        Dibangun dengan keamanan sebagai prioritas. Kontrol akses
                                        berbasis role memastikan data Anda terlindungi dan hanya dapat diakses personel
                                        yang berwenang.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5" data-aos="flip-left" data-aos-delay="300">
                            <div class="card h-100 shadow border-0 hover-scale">
                                <div class="card-body p-4 text-center">
                                    <div class="bg-warning bg-gradient text-white rounded-circle mb-3 mx-auto d-flex align-items-center justify-content-center pulse-icon"
                                        style="width: 4rem; height: 4rem;">
                                        <i class="bi bi-bar-chart-fill" style="font-size: 1.5rem;"></i>
                                    </div>
                                    <div class="mb-3">
                                        <i class="bi bi-graph-up text-warning me-2" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-pie-chart text-success me-2" style="font-size: 1.2rem;"></i>
                                        <i class="bi bi-clipboard-data text-info" style="font-size: 1.2rem;"></i>
                                    </div>
                                    <h5 class="card-title mb-3">
                                        <i class="bi bi-graph-up-arrow text-primary me-2"></i>
                                        Analitik & Insight
                                    </h5>
                                    <p class="card-text mb-0">
                                        <i class="bi bi-check-circle text-success me-1"></i>
                                        Buat keputusan berdasarkan data dengan pelaporan dan
                                        analitik komprehensif. Lacak penjualan, inventori, dan metrik performa secara
                                        real-time.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Call to action-->
                    <aside class="bg-primary bg-gradient rounded-3 p-4 p-sm-5 mt-5" data-aos="zoom-in">
                        <div
                            class="d-flex align-items-center justify-content-between flex-column flex-xl-row text-center text-xl-start">
                            <div class="mb-4 mb-xl-0">
                                <div class="fs-3 fw-bold text-white">Siap untuk Memulai?</div>
                                <div class="text-white-50">Bergabung dengan ribuan bisnis yang sudah menggunakan
                                    POSINAJA
                                    untuk mengoptimalkan operasional mereka.</div>
                            </div>
                            <div class="ms-xl-4">
                                <a href="/login" class="btn btn-light btn-lg px-4 hover-scale">Mulai Trial Gratis</a>
                            </div>
                        </div>
                    </aside>
                </div>
            </section>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto">
                        <div class="small m-0 text-white">Copyright &copy; POSINAJA System 2025</div>
                    </div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Kebijakan Privasi</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Syarat Layanan</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="/about">Hubungi Kami</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- AOS Animation JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- Custom JS -->
        <script>
            // Initialize AOS
            AOS.init({
                duration: 1000,
                once: true,
                offset: 100
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Navbar background change on scroll
            window.addEventListener('scroll', function () {
                const navbar = document.querySelector('.navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-primary');
                    navbar.style.backgroundColor = 'rgba(13, 110, 253, 0.95)';
                } else {
                    navbar.style.backgroundColor = '';
                }
            });

            // Add loading effect to buttons
            document.querySelectorAll('.btn').forEach(button => {
                button.addEventListener('click', function (e) {
                    if (this.href && this.href.includes('/login')) {
                        const originalText = this.innerHTML;
                        this.innerHTML = 'Loading<span class="loading-dots"></span>';
                        this.disabled = true;

                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                        }, 2000);
                    }
                });
            });

            // Counter animation for statistics (if you want to add them later)
            function animateCounter(element, target) {
                let current = 0;
                const increment = target / 100;
                const timer = setInterval(() => {
                    current += increment;
                    element.textContent = Math.floor(current);
                    if (current >= target) {
                        element.textContent = target;
                        clearInterval(timer);
                    }
                }, 20);
            }

            // Parallax effect for header icons
            window.addEventListener('scroll', function () {
                const scrolled = window.pageYOffset;
                const parallaxElements = document.querySelectorAll('.float-animation');

                parallaxElements.forEach(element => {
                    const speed = 0.5;
                    element.style.transform = `translateY(${scrolled * speed}px)`;
                });
            });
        </script>

        <!-- Google Analytics (replace with your tracking ID) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=GA_TRACKING_ID"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments); }
            gtag('js', new Date());
            gtag('config', 'GA_TRACKING_ID');
        </script>
    </body>

</html>
