<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Moukiess - Premium Homemade Cookies</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #D4AF37;
            --secondary: #8B4513;
            --dark: #2C1810;
            --light: #FFF8E7;
            --accent: #E6C068;
            --text: #1a1a1a;
            --white: #ffffff;
        }

        body {
            font-family: 'Poppins', sans-serif;
            color: var(--text);
            background: var(--white);
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 2px 20px rgba(0,0,0,0.05);
            transition: all 0.3s ease;
        }

        .navbar.scrolled {
            padding: 15px 50px;
            box-shadow: 0 2px 30px rgba(0,0,0,0.1);
        }

        .logo {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-links {
            display: flex;
            gap: 40px;
            align-items: center;
            list-style: none;
        }

        .nav-links a {
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .cart-icon {
            position: relative;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text);
            transition: color 0.3s;
        }

        .cart-icon:hover {
            color: var(--primary);
        }

        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background: var(--primary);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--light) 0%, #FFF 100%);
            padding: 100px 50px 50px;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '🍪';
            position: absolute;
            font-size: 30rem;
            opacity: 0.03;
            right: -5%;
            top: 50%;
            transform: translateY(-50%) rotate(15deg);
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(-50%) rotate(15deg); }
            50% { transform: translateY(-55%) rotate(20deg); }
        }

        .hero-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .hero-text h1 {
            font-family: 'Playfair Display', serif;
            font-size: 4.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 30px;
            color: var(--dark);
        }

        .hero-text .highlight {
            color: var(--primary);
            position: relative;
            display: inline-block;
        }

        .hero-text .highlight::after {
            content: '';
            position: absolute;
            bottom: 10px;
            left: 0;
            width: 100%;
            height: 15px;
            background: var(--accent);
            opacity: 0.3;
            z-index: -1;
        }

        .hero-text p {
            font-size: 1.3rem;
            color: #666;
            margin-bottom: 40px;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 20px;
        }

        .btn-primary, .btn-secondary {
            padding: 18px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            border: none;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(212, 175, 55, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text);
            border: 2px solid var(--text);
        }

        .btn-secondary:hover {
            background: var(--text);
            color: white;
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 30px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        }

        /* Stats Section */
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 80px;
        }

        .stat-card {
            text-align: center;
            padding: 30px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        .stat-card .number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--primary);
            font-family: 'Playfair Display', serif;
        }

        .stat-card .label {
            font-size: 1rem;
            color: #666;
            margin-top: 10px;
        }

        /* Products Section */
        .products-section {
            padding: 100px 50px;
            background: white;
        }

        .section-header {
            text-align: center;
            margin-bottom: 80px;
        }

        .section-header h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3.5rem;
            color: var(--dark);
            margin-bottom: 20px;
        }

        .section-header p {
            font-size: 1.2rem;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
        }

        .products-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 40px;
        }

        .product-card {
            background: white;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 5px 30px rgba(0,0,0,0.08);
            transition: all 0.4s ease;
            position: relative;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.15);
        }

        .product-image-wrapper {
            position: relative;
            height: 300px;
            background: var(--light);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image-wrapper::before {
            content: '🍪';
            font-size: 10rem;
            opacity: 0.5;
        }

        .product-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: var(--primary);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .product-info {
            padding: 30px;
        }

        .product-category {
            color: var(--primary);
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .product-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--dark);
            margin: 10px 0;
        }

        .product-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #f0f0f0;
        }

        .product-price {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary);
            font-family: 'Playfair Display', serif;
        }

        .add-to-cart-btn {
            padding: 12px 30px;
            background: var(--dark);
            color: white;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .add-to-cart-btn:hover {
            background: var(--primary);
            transform: scale(1.05);
        }

        /* Cart Sidebar */
        .cart-sidebar {
            position: fixed;
            right: -500px;
            top: 0;
            width: 500px;
            height: 100vh;
            background: white;
            box-shadow: -5px 0 30px rgba(0,0,0,0.1);
            z-index: 2000;
            transition: right 0.4s ease;
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar.active {
            right: 0;
        }

        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            z-index: 1999;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s;
        }

        .cart-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .cart-header {
            padding: 30px;
            border-bottom: 1px solid #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-header h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.8rem;
            color: var(--dark);
        }

        .close-cart {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text);
        }

        .cart-items {
            flex: 1;
            overflow-y: auto;
            padding: 30px;
        }

        .cart-item {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f0f0;
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            background: var(--light);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            color: var(--dark);
            margin-bottom: 5px;
        }

        .cart-item-price {
            color: var(--primary);
            font-weight: 600;
        }

        .cart-item-controls {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 10px;
        }

        .qty-btn {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            background: white;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 600;
        }

        .qty-input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 5px;
        }

        .remove-item {
            background: none;
            border: none;
            color: #e74c3c;
            cursor: pointer;
            margin-left: auto;
        }

        .cart-footer {
            padding: 30px;
            border-top: 1px solid #f0f0f0;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .cart-total .amount {
            color: var(--primary);
            font-family: 'Playfair Display', serif;
        }

        .checkout-btn {
            width: 100%;
            padding: 18px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .checkout-btn:hover {
            background: var(--dark);
            transform: translateY(-2px);
        }

        .empty-cart {
            text-align: center;
            padding: 50px 30px;
            color: #999;
        }

        .empty-cart i {
            font-size: 4rem;
            margin-bottom: 20px;
        }

        /* Testimonials Section */
        .testimonials-section {
            padding: 100px 50px;
            background: var(--light);
        }

        .testimonials-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
        }

        .testimonial-card {
            background: white;
            padding: 40px;
            border-radius: 25px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.08);
            transition: all 0.3s;
        }

        .testimonial-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.15);
        }

        .stars {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .testimonial-text {
            font-style: italic;
            color: #666;
            line-height: 1.8;
            margin-bottom: 30px;
            font-size: 1.05rem;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .author-avatar {
            width: 50px;
            height: 50px;
            background: var(--light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .author-name {
            font-weight: 600;
            color: var(--dark);
        }

        .author-location {
            font-size: 0.9rem;
            color: #999;
        }

        /* Gallery Section */
        .gallery-section {
            padding: 100px 50px;
            background: white;
        }

        .gallery-grid {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .gallery-item {
            height: 300px;
            border-radius: 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            color: white;
            transition: all 0.3s;
            cursor: pointer;
        }

        .gallery-item:hover {
            transform: scale(1.05);
        }

        .gallery-icon {
            font-size: 5rem;
            margin-bottom: 20px;
        }

        .gallery-label {
            font-size: 1.3rem;
            font-weight: 600;
        }

        /* Instagram Section */
        .instagram-section {
            padding: 100px 50px;
            background: linear-gradient(135deg, #833AB4 0%, #FD1D1D 50%, #F77737 100%);
            text-align: center;
        }

        .instagram-content h2 {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: white;
            margin-bottom: 20px;
        }

        .instagram-content p {
            color: rgba(255,255,255,0.9);
            font-size: 1.2rem;
            margin-bottom: 40px;
        }

        .instagram-content .btn-primary {
            background: white;
            color: #833AB4;
        }

        .instagram-content .btn-primary:hover {
            transform: translateY(-5px);
        }

        /* Footer */
        .footer {
            background: var(--dark);
            color: white;
            padding: 80px 50px 30px;
        }

        .footer-content {
            max-width: 1400px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 60px;
            margin-bottom: 40px;
        }

        .footer-logo {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .footer-section p {
            color: rgba(255,255,255,0.7);
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .footer-section h4 {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: var(--primary);
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 10px;
        }

        .footer-section ul li a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: color 0.3s;
        }

        .footer-section ul li a:hover {
            color: var(--primary);
        }

        .social-icons {
            display: flex;
            gap: 15px;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
            transition: all 0.3s;
            text-decoration: none;
        }

        .social-icons a:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.5);
        }

        /* Mobile Menu */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 20px;
            }

            .nav-links {
                display: none;
            }

            .mobile-menu-btn {
                display: block;
            }

            .hero {
                padding: 80px 20px 40px;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .hero-text h1 {
                font-size: 2.5rem;
            }

            .hero-text p {
                font-size: 1.1rem;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn-primary, .btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .stats {
                grid-template-columns: 1fr;
            }

            .section-header h2 {
                font-size: 2.5rem;
            }

            .products-section {
                padding: 60px 20px;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }

            .testimonials-section {
                padding: 60px 20px;
            }

            .testimonials-grid {
                grid-template-columns: 1fr;
            }

            .gallery-section {
                padding: 60px 20px;
            }

            .gallery-grid {
                grid-template-columns: 1fr;
            }

            .instagram-section {
                padding: 60px 20px;
            }

            .instagram-content h2 {
                font-size: 2rem;
            }

            .footer {
                padding: 60px 20px 30px;
            }

            .footer-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <a href="/" class="logo">
            <span>🍪</span>
            <span>Moukiess</span>
        </a>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="cart-icon" onclick="toggleCart()">
            <i class="bi bi-bag"></i>
            <span class="cart-count" id="cartCount">0</span>
        </div>
        <button class="mobile-menu-btn">
            <i class="bi bi-list"></i>
        </button>
    </nav>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <div class="hero-text">
                <h1>
                    Indulge in <span class="highlight">Premium</span><br>
                    Homemade Cookies
                </h1>
                <p>
                    Dibuat dengan bahan premium pilihan, setiap gigitan memberikan pengalaman
                    yang tak terlupakan. Sempurna untuk menemani hari Anda atau sebagai hadiah
                    istimewa.
                </p>
                <div class="hero-buttons">
                    <a href="#products" class="btn-primary">
                        <span>Lihat Produk</span>
                        <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" target="_blank" class="btn-secondary">
                        <i class="bi bi-whatsapp"></i>
                        <span>Hubungi Kami</span>
                    </a>
                </div>

                <!-- Stats -->
                <div class="stats">
                    <div class="stat-card">
                        <div class="number">500+</div>
                        <div class="label">Happy Customers</div>
                    </div>
                    <div class="stat-card">
                        <div class="number">8</div>
                        <div class="label">Varian Rasa</div>
                    </div>
                    <div class="stat-card">
                        <div class="number">100%</div>
                        <div class="label">Fresh & Homemade</div>
                    </div>
                </div>
            </div>

            <div class="hero-image">
                <div style="background: linear-gradient(135deg, var(--light) 0%, var(--accent) 100%); height: 500px; border-radius: 30px; display: flex; align-items: center; justify-content: center; font-size: 15rem;">
                    🍪
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section class="products-section" id="products">
        <div class="section-header">
            <h2>Our Premium Collection</h2>
            <p>Pilih dari berbagai varian cookies premium kami yang dibuat dengan resep rahasia keluarga</p>
        </div>

        <div class="products-grid">
            @foreach($products as $product)
            <div class="product-card">
                <div class="product-image-wrapper">
                    <span class="product-badge">{{ $product->category }}</span>
                </div>
                <div class="product-info">
                    <div class="product-category">{{ $product->category }}</div>
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="product-description">{{ $product->description }}</p>
                    
                    <div class="product-footer">
                        <div class="product-price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
                        <button class="add-to-cart-btn" onclick="addToCart({{ $product->id }}, '{{ $product->name }}', {{ $product->price }})">
                            <i class="bi bi-cart-plus"></i>
                            <span>Add to Cart</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials-section" id="testimonials">
        <div class="section-header">
            <h2>Apa Kata Mereka?</h2>
            <p>Ribuan pelanggan puas telah merasakan kelezatan cookies kami</p>
        </div>

        <div class="testimonials-grid">
            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">
                    "Cookies terenak yang pernah saya coba! Teksturnya sempurna, 
                    tidak terlalu keras dan tidak terlalu lembek. Favorit saya yang Chocolate Chip!"
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar">👩</div>
                    <div>
                        <div class="author-name">Sarah Wijaya</div>
                        <div class="author-location">Jakarta</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">
                    "Kemasan rapi, rasa premium! Cocok banget buat hampers atau hadiah. 
                    Red Velvet-nya juara, creamy dan tidak terlalu manis."
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar">👨</div>
                    <div>
                        <div class="author-name">Budi Santoso</div>
                        <div class="author-location">Bandung</div>
                    </div>
                </div>
            </div>

            <div class="testimonial-card">
                <div class="stars">⭐⭐⭐⭐⭐</div>
                <p class="testimonial-text">
                    "Pelayanan cepat, produk berkualitas! Matcha cookies-nya authentic banget, 
                    berasa matchanya. Pasti repeat order!"
                </p>
                <div class="testimonial-author">
                    <div class="author-avatar">👩</div>
                    <div>
                        <div class="author-name">Lisa Tan</div>
                        <div class="author-location">Surabaya</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section" id="gallery">
        <div class="section-header">
            <h2>Gallery</h2>
            <p>Lihat momen-momen manis bersama Moukiess Cookies</p>
        </div>

        <div class="gallery-grid">
            <div class="gallery-item" style="background: linear-gradient(135deg, #FF6B9D 0%, #C06C84 100%);">
                <div class="gallery-icon">🍪</div>
                <div class="gallery-label">Fresh Baked</div>
            </div>
            <div class="gallery-item" style="background: linear-gradient(135deg, #FEC260 0%, #FF8A5B 100%);">
                <div class="gallery-icon">📦</div>
                <div class="gallery-label">Premium Packaging</div>
            </div>
            <div class="gallery-item" style="background: linear-gradient(135deg, #00D2A0 0%, #6C5CE7 100%);">
                <div class="gallery-icon">🎁</div>
                <div class="gallery-label">Perfect Gift</div>
            </div>
            <div class="gallery-item" style="background: linear-gradient(135deg, #B565D8 0%, #FF6B9D 100%);">
                <div class="gallery-icon">❤️</div>
                <div class="gallery-label">Made with Love</div>
            </div>
        </div>
    </section>

    <!-- Instagram Section -->
    <section class="instagram-section" id="contact">
        <div class="instagram-content">
            <h2>Follow Us on Instagram</h2>
            <p>Dapatkan update terbaru, promo spesial, dan tips membuat cookies!</p>
            <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="btn-primary">
                <i class="bi bi-instagram"></i>
                <span>@mutiassgalaa</span>
            </a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-content">
            <div class="footer-section">
                <h3 class="footer-logo">🍪 Moukiess</h3>
                <p>Premium Homemade Cookies dibuat dengan cinta dan bahan pilihan terbaik.</p>
                <div class="social-icons">
                    <a href="{{ env('INSTAGRAM_URL') }}" target="_blank">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" target="_blank">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </div>
            </div>
            
            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                    <li><a href="#gallery">Gallery</a></li>
                </ul>
            </div>
            
            <div class="footer-section">
                <h4>Contact</h4>
                <p><i class="bi bi-whatsapp"></i> +{{ env('WHATSAPP_NUMBER') }}</p>
                <p><i class="bi bi-instagram"></i> @mutiassgalaa</p>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2024 Moukiess. All rights reserved. Made with ❤️ and 🍪</p>
        </div>
    </footer>

    <!-- Cart Overlay -->
    <div class="cart-overlay" id="cartOverlay" onclick="toggleCart()"></div>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar" id="cartSidebar">
        <div class="cart-header">
            <h3>Keranjang Belanja</h3>
            <button class="close-cart" onclick="toggleCart()">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <div class="cart-items" id="cartItems">
            <div class="empty-cart">
                <i class="bi bi-cart-x"></i>
                <p>Keranjang belanja Anda kosong</p>
            </div>
        </div>

        <div class="cart-footer">
            <div class="cart-total">
                <span>Total:</span>
                <span class="amount" id="cartTotal">Rp 0</span>
            </div>
            <button class="checkout-btn" onclick="checkout()">
                <i class="bi bi-whatsapp"></i>
                Checkout via WhatsApp
            </button>
        </div>
    </div>

    <script>
        let cart = [];

        // Toggle Cart
        function toggleCart() {
            const sidebar = document.getElementById('cartSidebar');
            const overlay = document.getElementById('cartOverlay');
            sidebar.classList.toggle('active');
            overlay.classList.toggle('active');
        }

        // Add to Cart
        function addToCart(id, name, price) {
            const existingItem = cart.find(item => item.id === id);
            
            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                cart.push({ id, name, price, quantity: 1 });
            }
            
            updateCart();
            
            // Show cart
            document.getElementById('cartSidebar').classList.add('active');
            document.getElementById('cartOverlay').classList.add('active');
        }

        // Update Cart Display
        function updateCart() {
            const cartItems = document.getElementById('cartItems');
            const cartCount = document.getElementById('cartCount');
            const cartTotal = document.getElementById('cartTotal');
            
            if (cart.length === 0) {
                cartItems.innerHTML = `
                    <div class="empty-cart">
                        <i class="bi bi-cart-x"></i>
                        <p>Keranjang belanja Anda kosong</p>
                    </div>
                `;
                cartCount.textContent = '0';
                cartTotal.textContent = 'Rp 0';
                return;
            }
            
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            const totalPrice = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            
            cartCount.textContent = totalItems;
            cartTotal.textContent = 'Rp ' + totalPrice.toLocaleString('id-ID');
            
            cartItems.innerHTML = cart.map(item => `
                <div class="cart-item">
                    <div class="cart-item-image">🍪</div>
                    <div class="cart-item-info">
                        <div class="cart-item-name">${item.name}</div>
                        <div class="cart-item-price">Rp ${item.price.toLocaleString('id-ID')}</div>
                        <div class="cart-item-controls">
                            <button class="qty-btn" onclick="updateQuantity(${item.id}, -1)">-</button>
                            <input type="number" class="qty-input" value="${item.quantity}" readonly>
                            <button class="qty-btn" onclick="updateQuantity(${item.id}, 1)">+</button>
                            <button class="remove-item" onclick="removeItem(${item.id})">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            `).join('');
        }

        // Update Quantity
        function updateQuantity(id, change) {
            const item = cart.find(item => item.id === id);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    removeItem(id);
                } else {
                    updateCart();
                }
            }
        }

        // Remove Item
        function removeItem(id) {
            cart = cart.filter(item => item.id !== id);
            updateCart();
        }

        // Checkout
        function checkout() {
            if (cart.length === 0) {
                alert('Keranjang belanja Anda kosong!');
                return;
            }
            
            const whatsappNumber = '{{ env("WHATSAPP_NUMBER") }}';
            let message = 'Halo! Saya ingin memesan:\n\n';
            
            cart.forEach(item => {
                message += `${item.name} x${item.quantity} = Rp ${(item.price * item.quantity).toLocaleString('id-ID')}\n`;
            });
            
            const total = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            message += `\n*Total: Rp ${total.toLocaleString('id-ID')}*`;
            
            const whatsappUrl = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(message)}`;
            window.open(whatsappUrl, '_blank');
        }

        // Navbar scroll effect
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            });
        });
    </script>
</body>
</html>
