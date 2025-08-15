<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Login - POSINAJA System</title>
        <meta name="description"
            content="Masuk ke POSINAJA System - Solusi Point of Sale modern untuk bisnis retail Anda.">

        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />

        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- AOS Animation CSS -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Custom CSS -->
        <style>
            body {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }

            .login-container {
                backdrop-filter: blur(10px);
                background: rgba(255, 255, 255, 0.95);
                border: 1px solid rgba(255, 255, 255, 0.2);
            }

            .brand-logo {
                background: linear-gradient(45deg, #007bff, #28a745);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                animation: pulse 2s infinite;
            }

            .floating-shapes {
                position: absolute;
                width: 100%;
                height: 100%;
                overflow: hidden;
                z-index: -1;
            }

            .shape {
                position: absolute;
                border-radius: 50%;
                opacity: 0.1;
                animation: float 6s ease-in-out infinite;
            }

            .shape:nth-child(1) {
                width: 80px;
                height: 80px;
                background: #007bff;
                top: 10%;
                left: 10%;
                animation-delay: 0s;
            }

            .shape:nth-child(2) {
                width: 60px;
                height: 60px;
                background: #28a745;
                top: 70%;
                left: 80%;
                animation-delay: 2s;
            }

            .shape:nth-child(3) {
                width: 40px;
                height: 40px;
                background: #ffc107;
                top: 40%;
                left: 70%;
                animation-delay: 4s;
            }

            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px) rotate(0deg);
                }

                50% {
                    transform: translateY(-20px) rotate(180deg);
                }
            }

            @keyframes pulse {
                0% {
                    transform: scale(1);
                }

                50% {
                    transform: scale(1.05);
                }

                100% {
                    transform: scale(1);
                }
            }

            .btn-primary-custom {
                background: linear-gradient(45deg, #007bff, #0056b3) !important;
                border: none !important;
                color: white !important;
                transition: all 0.3s ease;
            }

            .btn-primary-custom:hover {
                background: linear-gradient(45deg, #0056b3, #007bff) !important;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(0, 123, 255, 0.3) !important;
                color: white !important;
            }

            .form-control:focus {
                border-color: #007bff;
                box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
            }

            .login-card {
                transition: all 0.3s ease;
            }

            .login-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            }
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <!-- Floating Shapes Background -->
        <div class="floating-shapes">
            <div class="shape"></div>
            <div class="shape"></div>
            <div class="shape"></div>
        </div>

        <div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <!-- Brand Logo -->
                        <div class="text-center mb-4" data-aos="fade-down">
                            <a href="/" class="text-decoration-none">
                                <h2 class="brand-logo fw-bold fs-1 mb-2">
                                    <i class="bi bi-shop me-2"></i>POSINAJA
                                </h2>
                                <p class="text-white-50 mb-0">Sistem POS Modern untuk Bisnis Anda</p>
                            </a>
                        </div>

                        <!-- Login Card -->
                        <div class="card login-card login-container shadow-lg border-0" data-aos="fade-up"
                            data-aos-delay="200">
                            <div class="card-header bg-primary text-white text-center py-4">
                                <h4 class="mb-0">
                                    <i class="bi bi-box-arrow-in-right me-2"></i>
                                    Masuk ke Akun Anda
                                </h4>
                                <p class="mb-0 mt-2 opacity-75">Akses dashboard POSINAJA Anda</p>
                            </div>
                            <div class="card-body p-5">
                                {{ $slot }}
                            </div>
                            <div class="card-footer text-center py-3 bg-light">
                                <small class="text-muted">
                                    <i class="bi bi-shield-check text-success me-1"></i>
                                    Login Aman & Terlindungi
                                </small>
                            </div>
                        </div>

                        <!-- Back to Home -->
                        <div class="text-center mt-4" data-aos="fade-up" data-aos-delay="400">
                            <a href="/" class="btn btn-outline-light btn-sm">
                                <i class="bi bi-arrow-left me-2"></i>
                                Kembali ke Beranda
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

        <!-- AOS Animation JS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

        <!-- Custom JS -->
        <script>
            // Initialize AOS
            AOS.init({
                duration: 800,
                once: true
            });

            // Add some interactive effects
            document.addEventListener('DOMContentLoaded', function () {
                const loginCard = document.querySelector('.login-card');
                const inputs = document.querySelectorAll('input');

                inputs.forEach(input => {
                    input.addEventListener('focus', function () {
                        this.parentElement.style.transform = 'scale(1.02)';
                        this.parentElement.style.transition = 'all 0.3s ease';
                    });

                    input.addEventListener('blur', function () {
                        this.parentElement.style.transform = 'scale(1)';
                    });
                });
            });
        </script>
    </body>

</html>