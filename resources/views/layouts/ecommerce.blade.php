<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Moukiess') }} - Premium Homemade Cookies</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Playfair+Display:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <!-- AOS Animation Library -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ secure_asset('css/ecommerce-style.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/moukiess-features.css') }}">
</head>
<body>
    
    <!-- Navigation Bar -->
    <nav class="navbar-ecommerce">
        <div class="container">
            <div class="navbar-content">
                <!-- Logo -->
                <div class="navbar-logo">
                    <a href="/">
                        <h1 class="logo-text">Moukiess</h1>
                        <span class="logo-tagline">Premium Cookies</span>
                    </a>
                </div>

                <!-- Search Bar (Desktop) -->
                <div class="navbar-search">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Cari produk cookies...">
                    </div>
                </div>

                <!-- Navigation Links -->
                <div class="navbar-links">
                    <a href="#products" class="nav-link">Produk</a>
                    <a href="#about" class="nav-link">Tentang</a>
                    <a href="#contact" class="nav-link">Kontak</a>
                </div>

                <!-- Action Buttons -->
                <div class="navbar-actions">
                    <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="nav-icon" title="Instagram">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" target="_blank" class="nav-icon" title="WhatsApp">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                    <button class="nav-icon cart-icon" id="cart-btn-nav">
                        <i class="bi bi-cart3"></i>
                        <span class="cart-count" id="cart-count-nav">0</span>
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="mobile-menu-toggle" id="mobile-menu-toggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobile-menu">
        <div class="mobile-menu-header">
            <h3>Menu</h3>
            <button class="mobile-menu-close" id="mobile-menu-close">
                <i class="bi bi-x"></i>
            </button>
        </div>
        <div class="mobile-search">
            <div class="search-box">
                <i class="bi bi-search"></i>
                <input type="text" placeholder="Cari produk...">
            </div>
        </div>
        <div class="mobile-menu-links">
            <a href="#products" class="mobile-link">Produk</a>
            <a href="#about" class="mobile-link">Tentang</a>
            <a href="#contact" class="mobile-link">Kontak</a>
            <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="mobile-link">
                <i class="bi bi-instagram"></i> Instagram
            </a>
            <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" target="_blank" class="mobile-link">
                <i class="bi bi-whatsapp"></i> WhatsApp
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-ecommerce">
        <div class="container">
            <div class="footer-content">
                <!-- Company Info -->
                <div class="footer-col">
                    <h3 class="footer-title">Moukiess</h3>
                    <p class="footer-desc">
                        Premium homemade cookies dibuat dengan cinta dan bahan berkualitas tinggi. 
                        Dipanggang fresh setiap hari untuk kepuasan Anda.
                    </p>
                    <div class="footer-social">
                        <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="social-icon">
                            <i class="bi bi-instagram"></i>
                        </a>
                        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" target="_blank" class="social-icon">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-facebook"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="bi bi-tiktok"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="footer-col">
                    <h4 class="footer-heading">Quick Links</h4>
                    <ul class="footer-links">
                        <li><a href="#products">Produk</a></li>
                        <li><a href="#about">Tentang Kami</a></li>
                        <li><a href="#contact">Kontak</a></li>
                        <li><a href="#">Cara Order</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <!-- Customer Service -->
                <div class="footer-col">
                    <h4 class="footer-heading">Customer Service</h4>
                    <ul class="footer-links">
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat & Ketentuan</a></li>
                        <li><a href="#">Kebijakan Pengiriman</a></li>
                        <li><a href="#">Kebijakan Pengembalian</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div class="footer-col">
                    <h4 class="footer-heading">Hubungi Kami</h4>
                    <ul class="footer-contact">
                        <li>
                            <i class="bi bi-whatsapp"></i>
                            <span>{{ env('WHATSAPP_NUMBER') }}</span>
                        </li>
                        <li>
                            <i class="bi bi-instagram"></i>
                            <span>@moukiess</span>
                        </li>
                        <li>
                            <i class="bi bi-envelope"></i>
                            <span>hello@moukiess.id</span>
                        </li>
                        <li>
                            <i class="bi bi-clock"></i>
                            <span>Senin - Minggu: 09:00 - 21:00</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Moukiess. All Rights Reserved.</p>
                <p>Made with <i class="bi bi-heart-fill" style="color: #ff6b6b;"></i> in Indonesia</p>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button class="back-to-top" id="back-to-top">
        <i class="bi bi-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ secure_asset('js/moukiess-cart.js') }}"></script>
    <script src="{{ secure_asset('js/ecommerce-script.js') }}"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true,
            offset: 100
        });

        // Mobile Menu Toggle
        const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileMenuClose = document.getElementById('mobile-menu-close');

        mobileMenuToggle?.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        mobileMenuClose?.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            document.body.style.overflow = '';
        });

        // Back to Top
        const backToTop = document.getElementById('back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.add('visible');
            } else {
                backToTop.classList.remove('visible');
            }
        });

        backToTop?.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });

        // Navbar Scroll Effect
        let lastScroll = 0;
        const navbar = document.querySelector('.navbar-ecommerce');
        
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 100) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            lastScroll = currentScroll;
        });

        // Cart Nav Button
        const cartBtnNav = document.getElementById('cart-btn-nav');
        cartBtnNav?.addEventListener('click', () => {
            document.getElementById('cart-btn')?.click();
        });

        // Update cart count in navbar
        function updateNavCartCount() {
            const cartCountNav = document.getElementById('cart-count-nav');
            const cartBadge = document.getElementById('cart-badge');
            if (cartCountNav && cartBadge) {
                cartCountNav.textContent = cartBadge.textContent;
                cartCountNav.style.display = cartBadge.style.display;
            }
        }

        // Call this function whenever cart updates
        setInterval(updateNavCartCount, 500);
    </script>
</body>
</html>
