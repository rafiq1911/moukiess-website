// ========================================
// MOUKIESS - Shopping Cart System
// ========================================

class ShoppingCart {
    constructor() {
        this.cart = this.loadCart();
        this.init();
    }

    init() {
        this.updateCartUI();
        this.attachEventListeners();
    }

    // Load cart from localStorage
    loadCart() {
        const saved = localStorage.getItem('moukiess_cart');
        return saved ? JSON.parse(saved) : [];
    }

    // Save cart to localStorage
    saveCart() {
        localStorage.setItem('moukiess_cart', JSON.stringify(this.cart));
        this.updateCartUI();
    }

    // Add item to cart
    addItem(product) {
        const existingItem = this.cart.find(item => item.id === product.id);
        
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            this.cart.push({
                id: product.id,
                name: product.name,
                price: product.price,
                quantity: 1
            });
        }
        
        this.saveCart();
        this.showNotification(`${product.name} ditambahkan ke keranjang!`, 'success');
    }

    // Remove item from cart
    removeItem(productId) {
        this.cart = this.cart.filter(item => item.id !== productId);
        this.saveCart();
        this.showNotification('Item dihapus dari keranjang', 'info');
    }

    // Update quantity
    updateQuantity(productId, quantity) {
        const item = this.cart.find(item => item.id === productId);
        if (item) {
            item.quantity = Math.max(1, quantity);
            this.saveCart();
        }
    }

    // Get cart total
    getTotal() {
        return this.cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    }

    // Get cart count
    getCount() {
        return this.cart.reduce((count, item) => count + item.quantity, 0);
    }

    // Clear cart
    clearCart() {
        this.cart = [];
        this.saveCart();
    }

    // Update cart UI
    updateCartUI() {
        // Update cart badge
        const cartBadge = document.getElementById('cart-badge');
        const cartCount = this.getCount();
        
        if (cartBadge) {
            cartBadge.textContent = cartCount;
            cartBadge.style.display = cartCount > 0 ? 'flex' : 'none';
        }

        // Update cart modal content
        this.renderCartModal();
    }

    // Render cart modal
    renderCartModal() {
        const cartItems = document.getElementById('cart-items');
        const cartTotal = document.getElementById('cart-total');
        const emptyCart = document.getElementById('empty-cart');
        const cartContent = document.getElementById('cart-content');

        if (!cartItems) return;

        if (this.cart.length === 0) {
            if (emptyCart) emptyCart.style.display = 'block';
            if (cartContent) cartContent.style.display = 'none';
            return;
        }

        if (emptyCart) emptyCart.style.display = 'none';
        if (cartContent) cartContent.style.display = 'block';

        // Render items
        cartItems.innerHTML = this.cart.map(item => `
            <div class="cart-item" data-id="${item.id}">
                <div class="cart-item-info">
                    <h4>${item.name}</h4>
                    <p class="cart-item-price">Rp ${this.formatPrice(item.price)}</p>
                </div>
                <div class="cart-item-controls">
                    <button class="qty-btn" onclick="cart.updateQuantity(${item.id}, ${item.quantity - 1})">
                        <i class="bi bi-dash"></i>
                    </button>
                    <span class="qty-display">${item.quantity}</span>
                    <button class="qty-btn" onclick="cart.updateQuantity(${item.id}, ${item.quantity + 1})">
                        <i class="bi bi-plus"></i>
                    </button>
                    <button class="remove-btn" onclick="cart.removeItem(${item.id})">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>
            </div>
        `).join('');

        // Update total
        if (cartTotal) {
            cartTotal.textContent = `Rp ${this.formatPrice(this.getTotal())}`;
        }
    }

    // Format price
    formatPrice(price) {
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

    // Generate WhatsApp message
    generateWhatsAppMessage() {
        let message = '🍪 *ORDER DARI MOUKIESS*\n\n';
        message += '━━━━━━━━━━━━━━━━━━━━\n';
        
        this.cart.forEach((item, index) => {
            message += `${index + 1}. ${item.name}\n`;
            message += `   Qty: ${item.quantity} x Rp ${this.formatPrice(item.price)}\n`;
            message += `   Subtotal: Rp ${this.formatPrice(item.price * item.quantity)}\n\n`;
        });
        
        message += '━━━━━━━━━━━━━━━━━━━━\n';
        message += `*TOTAL: Rp ${this.formatPrice(this.getTotal())}*\n\n`;
        message += 'Mohon konfirmasi pesanan ini. Terima kasih! 🙏';
        
        return encodeURIComponent(message);
    }

    // Checkout via WhatsApp
    checkout() {
        if (this.cart.length === 0) {
            this.showNotification('Keranjang masih kosong!', 'error');
            return;
        }

        const whatsappNumber = document.querySelector('[data-whatsapp]')?.dataset.whatsapp || '6282164933189';
        const message = this.generateWhatsAppMessage();
        const url = `https://wa.me/${whatsappNumber}?text=${message}`;
        
        window.open(url, '_blank');
        
        // Optional: Clear cart after checkout
        // this.clearCart();
    }

    // Show notification
    showNotification(message, type = 'success') {
        // Remove existing notifications
        const existing = document.querySelector('.cart-notification');
        if (existing) existing.remove();

        // Create notification
        const notification = document.createElement('div');
        notification.className = `cart-notification ${type}`;
        notification.innerHTML = `
            <i class="bi bi-${type === 'success' ? 'check-circle' : type === 'error' ? 'x-circle' : 'info-circle'}"></i>
            <span>${message}</span>
        `;
        
        document.body.appendChild(notification);

        // Animate in
        setTimeout(() => notification.classList.add('show'), 10);

        // Remove after 3 seconds
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // Attach event listeners
    attachEventListeners() {
        // Add to cart buttons
        document.addEventListener('click', (e) => {
            const addBtn = e.target.closest('.add-to-cart-btn');
            if (addBtn) {
                e.preventDefault();
                const productData = JSON.parse(addBtn.dataset.product);
                this.addItem(productData);
            }
        });

        // Open cart modal
        const cartBtn = document.getElementById('cart-btn');
        const cartModal = document.getElementById('cart-modal');
        
        if (cartBtn && cartModal) {
            cartBtn.addEventListener('click', () => {
                cartModal.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        }

        // Close cart modal
        const closeCart = document.getElementById('close-cart');
        const cartModalOverlay = cartModal?.querySelector('.cart-modal-overlay');
        
        if (closeCart && cartModal) {
            closeCart.addEventListener('click', () => {
                cartModal.classList.remove('active');
                document.body.style.overflow = '';
            });
        }

        if (cartModalOverlay && cartModal) {
            cartModalOverlay.addEventListener('click', () => {
                cartModal.classList.remove('active');
                document.body.style.overflow = '';
            });
        }

        // Checkout button
        const checkoutBtn = document.getElementById('checkout-btn');
        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', () => this.checkout());
        }
    }
}

// Initialize cart when DOM is ready
let cart;
document.addEventListener('DOMContentLoaded', () => {
    cart = new ShoppingCart();
});
