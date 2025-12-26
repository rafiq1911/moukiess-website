@extends('layouts.app')

@section('content')
<!-- Hero Section with Cookie Theme -->
<div class="hero-section">
    <div class="hero-background">
        <div class="cookie-particle"></div>
        <div class="cookie-particle"></div>
        <div class="cookie-particle"></div>
    </div>
    
    <div class="hero-content">
        <div class="hero-badge">✨ Freshly Baked Daily ✨</div>
        <h1 class="hero-title">
            <span class="brand-name">Moukiess</span>
            <span class="tagline">Premium Homemade Cookies</span>
        </h1>
        <p class="hero-subtitle">Dibuat dengan cinta, dipanggang dengan sempurna</p>
        <div class="hero-stats">
            <div class="stat-item">
                <div class="stat-number">{{ $products->count() }}</div>
                <div class="stat-label">Varian Rasa</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">100%</div>
                <div class="stat-label">Homemade</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">Fresh</div>
                <div class="stat-label">Daily Baked</div>
            </div>
        </div>
        <div class="hero-buttons">
            <a href="{{ env('INSTAGRAM_URL') }}" target="_blank" class="btn btn-instagram">
                <i class="bi bi-instagram"></i> 
                <span>Follow Instagram</span>
            </a>
            <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}?text={{ urlencode(env('WHATSAPP_MESSAGE', 'Halo, saya tertarik dengan produk Moukiess')) }}" 
               target="_blank" class="btn btn-whatsapp">
                <i class="bi bi-whatsapp"></i> 
                <span>Order via WhatsApp</span>
            </a>
        </div>
    </div>
    
    <div class="scroll-indicator">
        <div class="mouse"></div>
        <span>Scroll to explore</span>
    </div>
</div>

<!-- Products Section -->
<div class="products-section">
    <div class="section-header">
        <span class="section-badge">Our Collection</span>
        <h2 class="section-title">Delicious Cookie Selection</h2>
        <p class="section-subtitle">Setiap cookies dibuat dengan resep rahasia dan bahan premium pilihan</p>
    </div>

    <div class="products-grid">
        @forelse($products as $index => $product)
            <div class="product-card" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <div class="product-badge">
                    @if($product->stock > 50)
                        <span class="badge-hot">🔥 Hot</span>
                    @elseif($product->stock > 0)
                        <span class="badge-limited">⚡ Limited</span>
                    @else
                        <span class="badge-sold">Sold Out</span>
                    @endif
                </div>
                
                <div class="product-image">
                    <div class="cookie-icon">🍪</div>
                    <div class="product-overlay">
                        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}?text={{ urlencode('Halo, saya ingin order ' . $product->name) }}" 
                           target="_blank" 
                           class="quick-order {{ $product->stock > 0 ? '' : 'disabled' }}">
                            <i class="bi bi-cart-plus"></i> Quick Order
                        </a>
                    </div>
                </div>
                
                <div class="product-info">
                    <h3 class="product-name">{{ $product->name }}</h3>
                    <p class="product-description">{{ $product->description }}</p>
                    
                    <div class="product-meta">
                        <div class="product-price">
                            <span class="price-label">Price</span>
                            <span class="price-value">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        </div>
                        <div class="product-stock {{ $product->stock > 0 ? 'in-stock' : 'out-of-stock' }}">
                            @if($product->stock > 0)
                                <i class="bi bi-check-circle-fill"></i> Ready
                            @else
                                <i class="bi bi-x-circle-fill"></i> Out
                            @endif
                        </div>
                    </div>
                    
                    <div style="display: flex; gap: 0.5rem;">
                        <button class="add-to-cart-btn {{ $product->stock > 0 ? '' : 'disabled' }}" 
                                data-product='{"id": {{ $product->id }}, "name": "{{ $product->name }}", "price": {{ $product->price }}}'
                                {{ $product->stock > 0 ? '' : 'disabled' }}>
                            <i class="bi bi-cart-plus"></i> Add to Cart
                        </button>
                        <a href="https://wa.me/{{ env('WHATSAPP_NUMBER') }}?text={{ urlencode('Halo, saya ingin order ' . $product->name) }}" 
                           target="_blank" 
                           class="btn-order-direct {{ $product->stock > 0 ? '' : 'disabled' }}">
                            <i class="bi bi-whatsapp"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="no-products">
                <div class="empty-icon">🍪</div>
                <h3>Belum Ada Produk</h3>
                <p>Produk cookies sedang dalam proses</p>
            </div>
        @endforelse
    </div>
</div>

<!-- Testimonial Section -->
<div class="testimonial-section">
    <div class="testimonial-header">
        <span class="testimonial-badge">Testimoni</span>
        <h2 class="testimonial-title">Apa Kata Mereka?</h2>
        <p style="color: var(--cookie-brown); font-size: 1.1rem;">Kepuasan pelanggan adalah prioritas kami</p>
    </div>
    
    <div class="testimonial-carousel">
        <div class="testimonial-track">
            <div class="testimonial-card">
                <div class="testimonial-header-card">
                    <div class="testimonial-avatar">S</div>
                    <div class="testimonial-info">
                        <h4>Sarah Putri</h4>
                        <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
                <p class="testimonial-text">"Cookies nya enak banget! Teksturnya crispy di luar, soft di dalam. Packing nya juga rapi dan aman. Recommended!"</p>
                <span class="testimonial-date">2 minggu yang lalu</span>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-header-card">
                    <div class="testimonial-avatar">R</div>
                    <div class="testimonial-info">
                        <h4>Rani Wijaya</h4>
                        <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
                <p class="testimonial-text">"Red Velvet nya juara! Ga terlalu manis, pas banget. Cocok buat cemilan sambil kerja. Order lagi pasti!"</p>
                <span class="testimonial-date">1 minggu yang lalu</span>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-header-card">
                    <div class="testimonial-avatar">D</div>
                    <div class="testimonial-info">
                        <h4>Dimas Anggara</h4>
                        <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
                <p class="testimonial-text">"Beli buat hampers, semua pada suka! Cookies nya premium, rasanya homemade banget. Worth it!"</p>
                <span class="testimonial-date">3 hari yang lalu</span>
            </div>
            
            <div class="testimonial-card">
                <div class="testimonial-header-card">
                    <div class="testimonial-avatar">L</div>
                    <div class="testimonial-info">
                        <h4>Luna Maharani</h4>
                        <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                    </div>
                </div>
                <p class="testimonial-text">"Matcha cookies favorit! Ga ada duanya. Pesanan datang cepat dan masih fresh. Top markotop!"</p>
                <span class="testimonial-date">5 hari yang lalu</span>
            </div>
        </div>
    </div>
</div>

<!-- Gallery Section -->
<div class="gallery-section">
    <div class="gallery-header">
        <span class="gallery-badge">Galeri</span>
        <h2 class="gallery-title">Our Delicious Gallery</h2>
        <p style="color: var(--cookie-brown); font-size: 1.1rem;">Lihat koleksi cookies kami yang menggugah selera</p>
    </div>
    
    <div class="gallery-grid">
        <div class="gallery-item" onclick="openLightbox('🍪')">
            <div class="gallery-item-image">🍪</div>
            <div class="gallery-item-overlay">
                <div class="gallery-item-text">Classic Cookies</div>
            </div>
        </div>
        <div class="gallery-item" onclick="openLightbox('🍫')">
            <div class="gallery-item-image">🍫</div>
            <div class="gallery-item-overlay">
                <div class="gallery-item-text">Chocolate Delight</div>
            </div>
        </div>
        <div class="gallery-item" onclick="openLightbox('🧁')">
            <div class="gallery-item-image">🧁</div>
            <div class="gallery-item-overlay">
                <div class="gallery-item-text">Sweet Treats</div>
            </div>
        </div>
        <div class="gallery-item" onclick="openLightbox('🥐')">
            <div class="gallery-item-image">🥐</div>
            <div class="gallery-item-overlay">
                <div class="gallery-item-text">Fresh Baked</div>
            </div>
        </div>
        <div class="gallery-item" onclick="openLightbox('🍩')">
            <div class="gallery-item-image">🍩</div>
            <div class="gallery-item-overlay">
                <div class="gallery-item-text">Colorful Mix</div>
            </div>
        </div>
        <div class="gallery-item" onclick="openLightbox('🎂')">
            <div class="gallery-item-image">🎂</div>
            <div class="gallery-item-overlay">
                <div class="gallery-item-text">Special Edition</div>
            </div>
        </div>
    </div>
</div>

<!-- Why Choose Us Section -->
<div class="features-section">
    <div class="features-grid">
        <div class="feature-item">
            <div class="feature-icon">🥇</div>
            <h3>Premium Quality</h3>
            <p>Bahan berkualitas tinggi pilihan</p>
        </div>
        <div class="feature-item">
            <div class="feature-icon">👨‍🍳</div>
            <h3>Homemade</h3>
            <p>Dibuat dengan tangan & penuh cinta</p>
        </div>
        <div class="feature-item">
            <div class="feature-icon">🎯</div>
            <h3>Fresh Daily</h3>
            <p>Dipanggang fresh setiap hari</p>
        </div>
        <div class="feature-item">
            <div class="feature-icon">📦</div>
            <h3>Fast Delivery</h3>
            <p>Pengiriman cepat & aman</p>
        </div>
    </div>
</div>

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
            <h2>🛒 Keranjang</h2>
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

<!-- Lightbox -->
<div class="lightbox" id="lightbox" onclick="closeLightbox()">
    <span class="lightbox-close">×</span>
    <div class="lightbox-content" id="lightbox-content"></div>
</div>

@endsection
