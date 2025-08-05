// ملف التفاعلات المتقدمة والسلاسة
class ParHubInteractions {
    constructor() {
        this.init();
    }

    init() {
        this.setupSmoothScrolling();
        this.setupParallaxEffects();
        this.setupHoverEffects();
        this.setupClickEffects();
        this.setupFormAnimations();
        this.setupNavigationAnimations();
        this.setupLoadingAnimations();
        this.setupIntersectionObserver();
        this.setupTypewriter();
        this.setupCounters();
    }

    // تحسين التمرير السلس
    setupSmoothScrolling() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                e.preventDefault();
                const target = document.querySelector(anchor.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // تحسين التمرير العام
        let lastScrollTop = 0;
        window.addEventListener('scroll', this.throttle(() => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollDirection = scrollTop > lastScrollTop ? 'down' : 'up';
            
            document.body.setAttribute('data-scroll-direction', scrollDirection);
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
        }, 10), { passive: true });
    }

    // تأثيرات المنظور
    setupParallaxEffects() {
        const parallaxElements = document.querySelectorAll('[data-parallax]');
        
        if (parallaxElements.length > 0) {
            window.addEventListener('scroll', this.throttle(() => {
                const scrolled = window.pageYOffset;
                
                parallaxElements.forEach(element => {
                    const rate = scrolled * -0.5;
                    element.style.transform = `translateY(${rate}px)`;
                });
            }, 16), { passive: true });
        }
    }

    // تأثيرات التمرير فوق العناصر
    setupHoverEffects() {
        // تأثير الرفع للكروت
        document.querySelectorAll('.lift-card').forEach(card => {
            card.addEventListener('mouseenter', (e) => {
                e.target.style.transform = 'translateY(-8px) scale(1.02)';
                e.target.style.boxShadow = '0 25px 50px -12px rgba(0, 0, 0, 0.25)';
            });

            card.addEventListener('mouseleave', (e) => {
                e.target.style.transform = '';
                e.target.style.boxShadow = '';
            });
        });

        // تأثير الإضاءة للأزرار
        document.querySelectorAll('.glow-btn').forEach(btn => {
            btn.addEventListener('mouseenter', (e) => {
                e.target.style.boxShadow = '0 0 30px rgba(102, 126, 234, 0.6)';
            });

            btn.addEventListener('mouseleave', (e) => {
                e.target.style.boxShadow = '';
            });
        });
    }

    // تأثيرات النقر
    setupClickEffects() {
        document.addEventListener('click', (e) => {
            const element = e.target.closest('.ripple-effect');
            if (element) {
                this.createRipple(e, element);
            }

            // تأثير الضغط للأزرار
            const button = e.target.closest('button, .btn');
            if (button) {
                button.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    button.style.transform = '';
                }, 150);
            }
        });
    }

    // إنشاء تأثير التمويج
    createRipple(event, element) {
        const ripple = document.createElement('span');
        const rect = element.getBoundingClientRect();
        const size = Math.max(rect.width, rect.height);
        const x = event.clientX - rect.left - size / 2;
        const y = event.clientY - rect.top - size / 2;

        ripple.style.width = ripple.style.height = size + 'px';
        ripple.style.left = x + 'px';
        ripple.style.top = y + 'px';
        ripple.classList.add('ripple');

        const existingRipple = element.querySelector('.ripple');
        if (existingRipple) {
            existingRipple.remove();
        }

        element.appendChild(ripple);

        setTimeout(() => {
            ripple.remove();
        }, 600);
    }

    // تحسين النماذج
    setupFormAnimations() {
        const inputs = document.querySelectorAll('input, textarea, select');

        inputs.forEach(input => {
            // تأثيرات التركيز
            input.addEventListener('focus', (e) => {
                const parent = e.target.closest('.form-group');
                if (parent) {
                    parent.classList.add('focused');
                }
            });

            input.addEventListener('blur', (e) => {
                const parent = e.target.closest('.form-group');
                if (parent && !e.target.value) {
                    parent.classList.remove('focused');
                }
            });

            // تحريك التسميات
            input.addEventListener('input', (e) => {
                const parent = e.target.closest('.form-group');
                if (parent) {
                    if (e.target.value) {
                        parent.classList.add('has-value');
                    } else {
                        parent.classList.remove('has-value');
                    }
                }
            });
        });
    }

    // تحسين التنقل
    setupNavigationAnimations() {
        const navItems = document.querySelectorAll('.nav-item');
        
        navItems.forEach(item => {
            item.addEventListener('click', (e) => {
                // إزالة الفئة النشطة من جميع العناصر
                navItems.forEach(nav => nav.classList.remove('active'));
                
                // إضافة الفئة النشطة للعنصر المنقور
                e.target.classList.add('active');
                
                // تحريك المؤشر
                this.moveIndicator(e.target);
            });
        });
    }

    // تحريك مؤشر التنقل
    moveIndicator(activeItem) {
        const indicator = document.querySelector('.nav-indicator');
        if (indicator && activeItem) {
            const rect = activeItem.getBoundingClientRect();
            const parentRect = activeItem.parentElement.getBoundingClientRect();
            
            indicator.style.left = (rect.left - parentRect.left) + 'px';
            indicator.style.width = rect.width + 'px';
        }
    }

    // تحسين حالات التحميل
    setupLoadingAnimations() {
        const loadingElements = document.querySelectorAll('.loading-animate');
        
        loadingElements.forEach(element => {
            this.startLoadingAnimation(element);
        });
    }

    // بدء حركة التحميل
    startLoadingAnimation(element) {
        element.style.background = 'linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%)';
        element.style.backgroundSize = '200% 100%';
        element.style.animation = 'loading 2s infinite';
    }

    // مراقب التقاطع للحركات
    setupIntersectionObserver() {
        const options = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                    
                    // إضافة تأخير متدرج
                    const siblings = [...entry.target.parentNode.children];
                    const index = siblings.indexOf(entry.target);
                    entry.target.style.animationDelay = `${index * 100}ms`;
                }
            });
        }, options);

        // مراقبة العناصر القابلة للحركة
        document.querySelectorAll('.animate-on-scroll').forEach(element => {
            observer.observe(element);
        });
    }

    // تأثير الكتابة
    setupTypewriter() {
        const typewriters = document.querySelectorAll('.typewriter');
        
        typewriters.forEach(element => {
            const text = element.textContent;
            element.textContent = '';
            
            let i = 0;
            const timer = setInterval(() => {
                if (i < text.length) {
                    element.textContent += text.charAt(i);
                    i++;
                } else {
                    clearInterval(timer);
                }
            }, 100);
        });
    }

    // عدادات متحركة
    setupCounters() {
        const counters = document.querySelectorAll('.counter');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    this.animateCounter(entry.target);
                }
            });
        });

        counters.forEach(counter => {
            observer.observe(counter);
        });
    }

    // تحريك العداد
    animateCounter(element) {
        const target = parseInt(element.getAttribute('data-target'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;

        const timer = setInterval(() => {
            current += step;
            if (current >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }

    // دالة التحكم في التكرار
    throttle(func, limit) {
        let inThrottle;
        return function() {
            const args = arguments;
            const context = this;
            if (!inThrottle) {
                func.apply(context, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    // دالة التأخير
    debounce(func, delay) {
        let timeoutId;
        return function() {
            const args = arguments;
            const context = this;
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => func.apply(context, args), delay);
        };
    }

    // تحسين الأداء
    optimizePerformance() {
        // تحسين الصور
        const images = document.querySelectorAll('img[data-src]');
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        images.forEach(img => imageObserver.observe(img));
    }

    // إضافة إشعار
    showNotification(message, type = 'info', duration = 5000) {
        const notification = document.createElement('div');
        notification.className = `notification-modern notification-slide ${type}`;
        notification.innerHTML = `
            <div class="flex items-center justify-between">
                <span>${message}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="ml-4">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.classList.add('hide');
            setTimeout(() => {
                notification.remove();
            }, 400);
        }, duration);
    }

    // مساعد لإنشاء حركة مخصصة
    createCustomAnimation(element, properties, duration = 300) {
        return new Promise((resolve) => {
            element.style.transition = `all ${duration}ms cubic-bezier(0.25, 0.46, 0.45, 0.94)`;
            
            Object.keys(properties).forEach(prop => {
                element.style[prop] = properties[prop];
            });

            setTimeout(() => {
                resolve();
            }, duration);
        });
    }
}

// تهيئة التفاعلات عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', () => {
    window.parHubInteractions = new ParHubInteractions();
});

// إضافة الأنماط الضرورية
const interactiveStyles = document.createElement('style');
interactiveStyles.textContent = `
    .ripple {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.6);
        transform: scale(0);
        animation: ripple 0.6s linear;
        pointer-events: none;
    }

    @keyframes ripple {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    @keyframes loading {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }

    .animate-on-scroll {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    }

    .animate-on-scroll.animate-in {
        opacity: 1;
        transform: translateY(0);
    }

    .form-group.focused .form-label {
        transform: translateY(-20px) scale(0.85);
        color: #667eea;
    }

    .form-group.has-value .form-label {
        transform: translateY(-20px) scale(0.85);
        color: #667eea;
    }

    .nav-indicator {
        position: absolute;
        height: 3px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 2px;
        transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        bottom: 0;
    }

    .typewriter::after {
        content: '|';
        animation: blink 1s infinite;
    }

    @keyframes blink {
        0%, 50% { opacity: 1; }
        51%, 100% { opacity: 0; }
    }
`;

document.head.appendChild(interactiveStyles);

console.log('🎨 تم تحميل التفاعلات المتقدمة بنجاح!');
