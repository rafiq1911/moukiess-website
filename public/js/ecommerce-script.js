// ========================================
// MOUKIESS E-COMMERCE SCRIPTS
// ========================================

document.addEventListener('DOMContentLoaded', function() {
    
    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offset = 80; // navbar height
                const targetPosition = target.offsetTop - offset;
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Search Functionality (Simple)
    const searchInputs = document.querySelectorAll('.search-box input');
    searchInputs.forEach(input => {
        input.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const productCards = document.querySelectorAll('.product-card-ecommerce');
            
            productCards.forEach(card => {
                const productName = card.querySelector('.product-name-ecommerce')?.textContent.toLowerCase();
                const productDesc = card.querySelector('.product-desc-ecommerce')?.textContent.toLowerCase();
                
                if (productName?.includes(searchTerm) || productDesc?.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = searchTerm === '' ? 'block' : 'none';
                }
            });
        });
    });

    // Lazy Load Images (if real images are added later)
    const observerOptions = {
        root: null,
        rootMargin: '50px',
        threshold: 0.1
    };

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                if (img.dataset.src) {
                    img.src = img.dataset.src;
                    img.classList.add('loaded');
                    observer.unobserve(img);
                }
            }
        });
    }, observerOptions);

    document.querySelectorAll('img[data-src]').forEach(img => {
        imageObserver.observe(img);
    });

    // Product Quick View Animation
    const productCards = document.querySelectorAll('.product-card-ecommerce');
    productCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.querySelector('.product-emoji')?.classList.add('animate');
        });
        
        card.addEventListener('mouseleave', function() {
            this.querySelector('.product-emoji')?.classList.remove('animate');
        });
    });

    // Category Cards Click
    const categoryCards = document.querySelectorAll('.category-card');
    categoryCards.forEach(card => {
        card.addEventListener('click', function() {
            const categoryName = this.querySelector('h3')?.textContent.toLowerCase();
            const productsSection = document.getElementById('products');
            if (productsSection) {
                productsSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    // Instagram Gallery Lightbox (Simple)
    const instaItems = document.querySelectorAll('.insta-item');
    instaItems.forEach(item => {
        item.addEventListener('click', function() {
            const emoji = this.querySelector('.insta-img')?.textContent;
            if (emoji) {
                // You can add custom lightbox here
                console.log('Clicked:', emoji);
            }
        });
    });

    // Add Loading State to Buttons
    document.querySelectorAll('.btn-add-cart, .btn-quick-view').forEach(btn => {
        btn.addEventListener('click', function() {
            if (!this.disabled) {
                this.classList.add('loading');
                setTimeout(() => {
                    this.classList.remove('loading');
                }, 500);
            }
        });
    });

    // Contact Form Handler
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            // Format WhatsApp message
            let waMessage = `*PESAN DARI WEBSITE MOUKIESS*\n\n`;
            waMessage += `📝 *Nama:* ${name}\n`;
            waMessage += `📧 *Email:* ${email}\n`;
            waMessage += `📱 *WhatsApp:* ${phone}\n`;
            waMessage += `📋 *Subjek:* ${subject}\n\n`;
            waMessage += `💬 *Pesan:*\n${message}\n\n`;
            waMessage += `━━━━━━━━━━━━━━━━━\n`;
            waMessage += `Dikirim dari: moukiess.id`;
            
            const encodedMessage = encodeURIComponent(waMessage);
            const whatsappNumber = document.querySelector('[data-whatsapp]')?.dataset.whatsapp || '6282164933189';
            const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
            
            // Open WhatsApp
            window.open(whatsappURL, '_blank');
            
            // Reset form
            contactForm.reset();
            
            // Show success message
            showNotification('Pesan akan dikirim via WhatsApp!', 'success');
        });
    }
    
    // Newsletter Form (if added)
    const newsletterForm = document.querySelector('.newsletter-form');
    if (newsletterForm) {
        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();
            const email = this.querySelector('input[type="email"]').value;
            console.log('Newsletter signup:', email);
            // Add AJAX call here
        });
    }

    // Product Emoji Animation
    const style = document.createElement('style');
    style.textContent = `
        .product-emoji.animate {
            animation: emojiPulse 0.5s ease;
        }
        
        @keyframes emojiPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.2) rotate(10deg); }
        }
        
        .btn-add-cart.loading,
        .btn-quick-view.loading {
            pointer-events: none;
            opacity: 0.7;
        }
        
        .btn-add-cart.loading::after,
        .btn-quick-view.loading::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(255,255,255,0.3);
            border-radius: inherit;
            animation: pulse 1s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 0; }
            50% { opacity: 1; }
        }
    `;
    document.head.appendChild(style);

    // Console Welcome Message
    console.log('%c🍪 Welcome to Moukiess!', 'font-size: 20px; font-weight: bold; color: #2c3e50;');
    console.log('%cPremium Homemade Cookies', 'font-size: 14px; color: #e74c3c;');
});

// Notification Function
function showNotification(message, type = 'success') {
    const existing = document.querySelector('.notification-toast');
    if (existing) existing.remove();

    const notification = document.createElement('div');
    notification.className = `notification-toast ${type}`;
    notification.innerHTML = `
        <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
        <span>${message}</span>
    `;
    
    document.body.appendChild(notification);

    setTimeout(() => notification.classList.add('show'), 10);

    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Add notification styles
const notifStyle = document.createElement('style');
notifStyle.textContent = `
    .notification-toast {
        position: fixed;
        top: 100px;
        right: -400px;
        background: white;
        padding: 20px 25px;
        border-radius: 15px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        gap: 15px;
        z-index: 10000;
        transition: right 0.3s ease;
        min-width: 300px;
    }
    
    .notification-toast.show {
        right: 30px;
    }
    
    .notification-toast.success {
        border-left: 4px solid #27ae60;
    }
    
    .notification-toast.success i {
        color: #27ae60;
        font-size: 1.5rem;
    }
    
    .notification-toast.error {
        border-left: 4px solid #e74c3c;
    }
    
    .notification-toast.error i {
        color: #e74c3c;
        font-size: 1.5rem;
    }
    
    .notification-toast span {
        color: #2c3e50;
        font-weight: 500;
    }
    
    @media (max-width: 768px) {
        .notification-toast {
            right: -100%;
            left: 20px;
            min-width: auto;
            max-width: calc(100% - 40px);
        }
        
        .notification-toast.show {
            right: auto;
            left: 20px;
        }
    }
`;
document.head.appendChild(notifStyle);

// Utility Functions
function formatPrice(price) {
    return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, '.');
}

function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Export for use in other scripts
window.MoukiessUtils = {
    formatPrice,
    debounce
};
