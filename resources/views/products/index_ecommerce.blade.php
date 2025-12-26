@extends('layouts.ecommerce')

@section('content')

<!-- Hero Slider Section -->
<section class="hero-slider">
    <div class="hero-slide active" style="background: linear-gradient(rgba(0,0,0,0.3), rgba(0,0,0,0.3)), url('https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1600') center/cover;">
        <div class="hero-content">
            <h1 class="hero-title" data-aos="fade-up">Premium Homemade Cookies</h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="100">Dibuat dengan cinta, dipanggang dengan sempurna setiap hari</p>
            <div class="hero-buttons" data-aos="fade-up" data-aos-delay="200">
                <a href="#products" class="btn-hero btn-primary">Belanja Sekarang</a>
                <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="btn-hero btn-secondary">Follow Instagram</a>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="categories-section">
    <div class="container">
        <div class="categories-grid">
            <div class="category-card" data-aos="fade-up">
                <div class="category-icon">🍪</div>
                <h3>Classic Cookies</h3>
                <p>Rasa klasik yang timeless</p>
            </div>
            <div class="category-card" data-aos="fade-up" data-aos-delay="100">
                <div class="category-icon">🍫</div>
                <h3>Chocolate Series</h3>
                <p>Kaya akan cokelat premium</p>
            </div>
            <div class="category-card" data-aos="fade-up" data-aos-delay="200">
                <div class="category-icon">🌿</div>
                <h3>Special Flavors</h3>
                <p>Varian rasa unik & spesial</p>
            </div>
            <div class="category-card" data-aos="fade-up" data-aos-delay="300">
                <div class="category-icon">🎁</div>
                <h3>Gift Packages</h3>
                <p>Perfect untuk hadiah</p>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="products-section" id="products">
    <div class="container">
        <div class="section-header-ecommerce">
            <h2 class="section-title-ecommerce" data-aos="fade-up">Produk Kami</h2>
            <p class="section-subtitle-ecommerce" data-aos="fade-up" data-aos-delay="100">
                Pilihan cookies premium dengan berbagai varian rasa
            </p>
        </div>

        <div class="products-grid-ecommerce">
            @forelse($products as $product)
                <div class="product-card-ecommerce" data-aos="fade-up">
                    <!-- Product Badge -->
                    @if($product->stock > 50)
                        <span class="product-badge badge-bestseller">Best Seller</span>
                    @elseif($product->stock > 0 && $product->stock <= 10)
                        <span class="product-badge badge-limited">Limited Stock</span>
                    @elseif($product->stock == 0)
                        <span class="product-badge badge-soldout">Sold Out</span>
                    @endif

                    <!-- Product Image -->
                    <div class="product-image-ecommerce">
                        <div class="product-img-placeholder">
                            <span class="product-emoji">🍪</span>
                        </div>
                        <!-- Quick View Overlay -->
                        <div class="product-overlay-ecommerce">
                            <button class="btn-quick-view add-to-cart-btn" 
                                    data-product='{"id": {{ $product->id }}, "name": "{{ $product->name }}", "price": {{ $product->price }}}'
                                    {{ $product->stock > 0 ? '' : 'disabled' }}>
                                <i class="bi bi-cart-plus"></i> Add to Cart
                            </button>
                        </div>
                    </div>

                    <!-- Product Info -->
                    <div class="product-info-ecommerce">
                        <h3 class="product-name-ecommerce">{{ $product->name }}</h3>
                        <p class="product-desc-ecommerce">{{ Str::limit($product->description, 60) }}</p>
                        
                        <div class="product-footer-ecommerce">
                            <div class="product-price-ecommerce">
                                <span class="price-current">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="product-actions-ecommerce">
                                <button class="btn-add-cart add-to-cart-btn" 
                                        data-product='{"id": {{ $product->id }}, "name": "{{ $product->name }}", "price": {{ $product->price }}}'
                                        {{ $product->stock > 0 ? '' : 'disabled' }}>
                                    <i class="bi bi-cart-plus"></i>
                                </button>
                                <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}?text={{ urlencode('Halo, saya ingin order ' . $product->name) }}" 
                                   target="_blank" 
                                   class="btn-whatsapp-product"
                                   {{ $product->stock > 0 ? '' : 'style=pointer-events:none;opacity:0.5' }}>
                                    <i class="bi bi-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="no-products-ecommerce">
                    <i class="bi bi-inbox"></i>
                    <h3>Belum Ada Produk</h3>
                    <p>Produk akan segera ditambahkan</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="why-choose-section">
    <div class="container">
        <h2 class="section-title-ecommerce" data-aos="fade-up">Mengapa Memilih Kami?</h2>
        <div class="features-grid-ecommerce">
            <div class="feature-card-ecommerce" data-aos="fade-up">
                <div class="feature-icon-ecommerce">
                    <i class="bi bi-shield-check"></i>
                </div>
                <h3>Kualitas Terjamin</h3>
                <p>Menggunakan bahan-bahan premium pilihan berkualitas tinggi</p>
            </div>
            <div class="feature-card-ecommerce" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-icon-ecommerce">
                    <i class="bi bi-heart"></i>
                </div>
                <h3>Homemade</h3>
                <p>Dibuat dengan tangan dan penuh cinta di dapur kami</p>
            </div>
            <div class="feature-card-ecommerce" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-icon-ecommerce">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h3>Fresh Daily</h3>
                <p>Dipanggang fresh setiap hari untuk kesegaran maksimal</p>
            </div>
            <div class="feature-card-ecommerce" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-icon-ecommerce">
                    <i class="bi bi-truck"></i>
                </div>
                <h3>Fast Delivery</h3>
                <p>Pengiriman cepat dan aman ke seluruh Indonesia</p>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section" id="about">
    <div class="container">
        <div class="about-content">
            <div class="about-image" data-aos="fade-right">
                <div class="about-image-placeholder">
                    <span class="about-emoji">🍪</span>
                </div>
            </div>
            <div class="about-text" data-aos="fade-left">
                <span class="section-badge-small">Tentang Kami</span>
                <h2 class="section-title-ecommerce">Premium Homemade Cookies</h2>
                <p class="about-description">
                    <strong>Moukiess</strong> adalah brand cookies premium yang didirikan dengan passion untuk menghadirkan 
                    cookies homemade berkualitas tinggi. Setiap cookies dibuat dengan tangan menggunakan resep rahasia 
                    dan bahan-bahan pilihan terbaik.
                </p>
                <p class="about-description">
                    Kami berkomitmen untuk memberikan produk yang tidak hanya enak, tapi juga aman dan berkualitas. 
                    Dipanggang fresh setiap hari dengan standar kebersihan yang ketat, cookies kami menjadi pilihan 
                    sempurna untuk menemani hari-hari Anda atau sebagai hadiah spesial.
                </p>
                <div class="about-stats">
                    <div class="stat-box">
                        <h3>500+</h3>
                        <p>Happy Customers</p>
                    </div>
                    <div class="stat-box">
                        <h3>8+</h3>
                        <p>Varian Rasa</p>
                    </div>
                    <div class="stat-box">
                        <h3>100%</h3>
                        <p>Homemade</p>
                    </div>
                </div>
                <div class="about-buttons">
                    <a href="#products" class="btn-hero btn-primary">Lihat Produk</a>
                    <a href="#contact" class="btn-hero btn-secondary">Hubungi Kami</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Instagram Section -->
<section class="instagram-section">
    <div class="container">
        <h2 class="section-title-ecommerce" data-aos="fade-up">Follow Us on Instagram</h2>
        <p class="section-subtitle-ecommerce" data-aos="fade-up" data-aos-delay="100">
            @moukiess - Lihat update produk & promo terbaru
        </p>
        <div class="instagram-gallery">
            <div class="insta-item" data-aos="zoom-in">
                <div class="insta-img">🍪</div>
            </div>
            <div class="insta-item" data-aos="zoom-in" data-aos-delay="100">
                <div class="insta-img">🍫</div>
            </div>
            <div class="insta-item" data-aos="zoom-in" data-aos-delay="200">
                <div class="insta-img">🧁</div>
            </div>
            <div class="insta-item" data-aos="zoom-in" data-aos-delay="300">
                <div class="insta-img">🎂</div>
            </div>
            <div class="insta-item" data-aos="zoom-in" data-aos-delay="400">
                <div class="insta-img">🥐</div>
            </div>
            <div class="insta-item" data-aos="zoom-in" data-aos-delay="500">
                <div class="insta-img">🍩</div>
            </div>
        </div>
        <div class="instagram-button" data-aos="fade-up">
            <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="btn-instagram-follow">
                <i class="bi bi-instagram"></i> Follow @moukiess
            </a>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section" id="contact">
    <div class="container">
        <div class="section-header-ecommerce">
            <span class="section-badge-small" data-aos="fade-up">Hubungi Kami</span>
            <h2 class="section-title-ecommerce" data-aos="fade-up">Get In Touch</h2>
            <p class="section-subtitle-ecommerce" data-aos="fade-up" data-aos-delay="100">
                Punya pertanyaan? Kami siap membantu Anda!
            </p>
        </div>

        <div class="contact-content">
            <!-- Contact Info -->
            <div class="contact-info" data-aos="fade-right">
                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <h3>WhatsApp</h3>
                    <p>{{ env('WHATSAPP_NUMBER') }}</p>
                    <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}" target="_blank" class="contact-link">
                        Chat Sekarang <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <h3>Instagram</h3>
                    <p>@moukiess</p>
                    <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="contact-link">
                        Follow Us <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                    <h3>Email</h3>
                    <p>hello@moukiess.id</p>
                    <a href="mailto:hello@moukiess.id" class="contact-link">
                        Send Email <i class="bi bi-arrow-right"></i>
                    </a>
                </div>

                <div class="contact-card">
                    <div class="contact-icon">
                        <i class="bi bi-clock"></i>
                    </div>
                    <h3>Jam Operasional</h3>
                    <p>Senin - Minggu</p>
                    <p>09:00 - 21:00 WIB</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-wrapper" data-aos="fade-left">
                <form class="contact-form" id="contact-form">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required placeholder="nama@email.com">
                    </div>

                    <div class="form-group">
                        <label for="phone">No. WhatsApp</label>
                        <input type="tel" id="phone" name="phone" required placeholder="08xxxxxxxxxx">
                    </div>

                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <select id="subject" name="subject" required>
                            <option value="">Pilih subjek...</option>
                            <option value="order">Pertanyaan Order</option>
                            <option value="product">Info Produk</option>
                            <option value="custom">Custom Order</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" name="message" rows="5" required placeholder="Tulis pesan Anda di sini..."></textarea>
                    </div>

                    <button type="submit" class="btn-submit">
                        <i class="bi bi-send"></i> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Floating Cart Button -->
<div class="floating-cart" id="cart-btn" data-whatsapp="{{ env('WHATSAPP_NUMBER') }}">
    <i class="bi bi-cart3"></i>
    <span class="cart-badge" id="cart-badge" style="display: none;">0</span>
</div>

<!-- Cart Modal -->
<div class="cart-modal" id="cart-modal">
    <div class="cart-modal-overlay"></div>
    <div class="cart-modal-content">
        <div class="cart-header">
            <h2>🛒 Keranjang Belanja</h2>
            <button class="close-cart" id="close-cart">
                <i class="bi bi-x"></i>
            </button>
        </div>
        
        <div class="cart-body">
            <div class="empty-cart" id="empty-cart">
                <div class="empty-cart-icon">🛒</div>
                <h3>Keranjang Kosong</h3>
                <p>Belum ada produk di keranjang</p>
            </div>
            
            <div id="cart-content" style="display: none;">
                <div id="cart-items"></div>
            </div>
        </div>
        
        <div class="cart-footer">
            <div class="cart-total">
                <span class="cart-total-label">Total:</span>
                <span class="cart-total-value" id="cart-total">Rp 0</span>
            </div>
            <button class="checkout-btn" id="checkout-btn">
                <i class="bi bi-whatsapp"></i>
                Checkout via WhatsApp
            </button>
        </div>
    </div>
</div>

@endsection
