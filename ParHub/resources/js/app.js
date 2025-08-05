import './bootstrap';
import './interactions';

// Alpine.js
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// تحسينات السلاسة والأداء
document.addEventListener('DOMContentLoaded', function() {
    initSmoothInteractions();
    initPageTransitions();
    initScrollAnimations();
    initFormEnhancements();
    initLoadingStates();
});

// تحسين التفاعلات
function initSmoothInteractions() {
    // تحسين النقرات
    document.addEventListener('click', function(e) {
        const button = e.target.closest('button, [role="button"], a');
        if (button && !button.disabled) {
            button.style.transform = 'scale(0.98)';
            setTimeout(() => {
                button.style.transform = '';
            }, 150);
        }
    });

    // تحسين التمرير فوق العناصر
    const hoverElements = document.querySelectorAll('.card-hover, .glass-effect');
    hoverElements.forEach(element => {
        element.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-4px)';
        });
        
        element.addEventListener('mouseleave', function() {
            this.style.transform = '';
        });
    });
}

// انتقالات الصفحات
function initPageTransitions() {
    document.body.style.opacity = '0';
    document.body.style.transform = 'translateY(20px)';
    
    setTimeout(() => {
        document.body.style.transition = 'all 0.6s cubic-bezier(0.25, 0.46, 0.45, 0.94)';
        document.body.style.opacity = '1';
        document.body.style.transform = 'translateY(0)';
    }, 100);
}

// تحريك العناصر عند التمرير
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in');
                const delay = Array.from(entry.target.parentNode.children).indexOf(entry.target) * 100;
                entry.target.style.animationDelay = `${delay}ms`;
            }
        });
    }, observerOptions);

    const animatedElements = document.querySelectorAll('.card, .glass-effect, [data-animate]');
    animatedElements.forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        observer.observe(element);
    });
}

// تحسين النماذج
function initFormEnhancements() {
    const inputs = document.querySelectorAll('input, textarea, select');
    
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentNode.style.transform = 'scale(1.02)';
            this.parentNode.style.transition = 'all 0.2s ease';
        });
        
        input.addEventListener('blur', function() {
            this.parentNode.style.transform = 'scale(1)';
        });
    });
}

// حالات التحميل
function initLoadingStates() {
    document.addEventListener('click', function(e) {
        const button = e.target.closest('button[type="submit"], .loading-button');
        if (button && !button.disabled) {
            showLoadingState(button);
        }
    });
}

// إظهار حالة التحميل للزر
function showLoadingState(button) {
    const originalText = button.textContent;
    button.disabled = true;
    button.style.opacity = '0.7';
    button.innerHTML = `
        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
        جاري التحميل...
    `;

    setTimeout(() => {
        button.disabled = false;
        button.style.opacity = '1';
        button.textContent = originalText;
    }, 3000);
}

// إضافة مؤشر مخصص بسيط
const style = document.createElement('style');
style.textContent = `
    .loading {
        cursor: wait;
    }
    
    .touch-active {
        transform: scale(0.95);
        transition: transform 0.1s ease;
    }
    
    .fade-in {
        animation: fadeIn 0.6s ease-out forwards;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }
`;
document.head.appendChild(style);

console.log('🚀 تم تحميل تحسينات السلاسة بنجاح!');