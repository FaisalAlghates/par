<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
<meta name="theme-color" content="#667eea" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="default" />
<meta name="csrf-token" content="{{ csrf_token() }}" />

<title>{{ $title ?? config('app.name') }}</title>

<link rel="icon" href="/favicon.ico" sizes="any">
<link rel="icon" href="/favicon.svg" type="image/svg+xml">
<link rel="apple-touch-icon" href="/apple-touch-icon.png">

<!-- تحسين الخطوط للأداء -->
<link rel="preconnect" href="https://fonts.bunny.net" crossorigin>
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" rel="stylesheet" />
<link rel="preload" href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">

<!-- تحسينات الأداء والسلاسة -->
<style>
    /* منع وميض التحميل */
    body { 
        opacity: 0; 
        transition: opacity 0.3s ease;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    body.loaded { 
        opacity: 1; 
    }
    
    /* تحسين التمرير */
    html {
        scroll-behavior: smooth;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    
    /* تحسين الحركة */
    * {
        transform: translateZ(0);
        backface-visibility: hidden;
    }
    
    /* Loading State */
    .page-loading {
        position: fixed;
        inset: 0;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        transition: opacity 0.5s ease;
    }
    
    .loading-spinner {
        width: 50px;
        height: 50px;
        border: 4px solid rgba(255, 255, 255, 0.3);
        border-top: 4px solid white;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    
    /* تحسين للأجهزة المحمولة */
    @media (max-width: 768px) {
        body {
            -webkit-overflow-scrolling: touch;
            overscroll-behavior: none;
        }
    }
</style>

@vite(['resources/css/app.css', 'resources/js/app.js'])
@fluxAppearance

<script>
    // إزالة شاشة التحميل عند جاهزية الصفحة
    document.addEventListener('DOMContentLoaded', function() {
        document.body.classList.add('loaded');
        
        // إخفاء شاشة التحميل إن وجدت
        const loader = document.querySelector('.page-loading');
        if (loader) {
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => loader.remove(), 300);
            }, 500);
        }
    });
    
    // تحسين الأداء
    if ('requestIdleCallback' in window) {
        requestIdleCallback(() => {
            // تحميل الموارد غير الضرورية في وقت الفراغ
        });
    }
</script>
