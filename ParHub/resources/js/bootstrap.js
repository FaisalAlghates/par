/**
 * ملف تحسين Bootstrap للموقع
 * يحتوي على إعدادات الأداء والسلاسة
 */

// تحسين إعدادات Axios
import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.timeout = 10000;

// تحسين الأداء العام
document.addEventListener('DOMContentLoaded', function() {
    // تحسين الصور
    const optimizeImages = () => {
        const images = document.querySelectorAll('img');
        images.forEach(img => {
            if (!img.loading) {
                img.loading = 'lazy';
            }
            
            img.addEventListener('load', function() {
                this.style.opacity = '1';
                this.style.transform = 'scale(1)';
            });
            
            img.addEventListener('error', function() {
                this.style.opacity = '0.5';
                this.alt = 'خطأ في تحميل الصورة';
            });
        });
    };

    // تشغيل التحسينات
    optimizeImages();
    
    // تحسين الأداء
    document.body.style.transform = 'translateZ(0)';
    document.body.style.backfaceVisibility = 'hidden';
});

// تحسين التمرير
let ticking = false;
const updateScroll = () => {
    ticking = false;
};

const requestTick = () => {
    if (!ticking) {
        requestAnimationFrame(updateScroll);
        ticking = true;
    }
};

document.addEventListener('scroll', requestTick, { passive: true });

// تحسين التفاعل مع اللمس
if ('ontouchstart' in window) {
    document.body.classList.add('touch-device');
    
    let touchStartTime = 0;
    
    document.addEventListener('touchstart', (e) => {
        touchStartTime = Date.now();
        e.target.classList.add('touch-active');
    }, { passive: true });
    
    document.addEventListener('touchend', (e) => {
        const touchEndTime = Date.now();
        const touchDuration = touchEndTime - touchStartTime;
        
        setTimeout(() => {
            e.target.classList.remove('touch-active');
        }, Math.max(0, 150 - touchDuration));
    }, { passive: true });
}

// مساعدين للأداء
window.ParHubHelpers = {
    debounce(func, delay) {
        let timeoutId;
        return (...args) => {
            clearTimeout(timeoutId);
            timeoutId = setTimeout(() => func.apply(this, args), delay);
        };
    },
    
    throttle(func, limit) {
        let inThrottle;
        return (...args) => {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }
};

console.log('⚡ تم تحميل Bootstrap بتحسينات الأداء!');
