<x-layouts.app :title="'تحرير العرض التقديمي: ' . $presentation->title">
    <div class="min-h-screen bg-gradient-to-br from-slate-50 to-blue-50 dark:from-slate-900 dark:to-slate-800">
        
        <!-- Header -->
        <div class="bg-white dark:bg-slate-800 shadow-sm border-b border-gray-200 dark:border-gray-700">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex items-center justify-between h-16">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('presentations.index') }}" 
                           class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                            </svg>
                            العودة للعروض التقديمية
                        </a>
                        <div class="text-lg font-semibold text-gray-900 dark:text-white">
                            {{ $presentation->title }}
                        </div>
                    </div>
                    
                    <div class="flex items-center space-x-3">
                        <!-- حفظ تلقائي -->
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            آخر حفظ: {{ $presentation->updated_at->diffForHumans() }}
                        </div>
                        
                        <!-- أزرار الإجراءات -->
                        <button onclick="savePresentation()" 
                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3-3m0 0l-3 3m3-3v12"></path>
                            </svg>
                            حفظ
                        </button>
                        
                        <button onclick="previewPresentation()" 
                                class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md transition">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            معاينة
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- محتوى الصفحة -->
        <div class="flex h-[calc(100vh-4rem)]">
            
            <!-- الشريط الجانبي للشرائح -->
            <div class="w-80 bg-white dark:bg-slate-800 border-r border-gray-200 dark:border-gray-700 overflow-y-auto">
                <div class="p-4">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">الشرائح</h3>
                        <button onclick="addSlide()" 
                                class="inline-flex items-center px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded transition">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            إضافة شريحة
                        </button>
                    </div>
                    
                    <!-- قائمة الشرائح -->
                    <div id="slides-list" class="space-y-3">
                        @if($presentation->slides)
                            @foreach(json_decode($presentation->slides, true)['slides'] ?? [] as $index => $slide)
                                <div class="slide-item p-3 border border-gray-200 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition"
                                     onclick="selectSlide({{ $index }})">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm font-medium text-gray-900 dark:text-white">
                                            {{ $index + 1 }}. {{ $slide['title'] ?? 'شريحة فارغة' }}
                                        </span>
                                        <button onclick="deleteSlide({{ $index }})" 
                                                class="text-red-500 hover:text-red-700 transition">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                                        {{ $slide['type'] ?? 'محتوى' }}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286"></path>
                                </svg>
                                <p class="mt-2 text-sm">لا توجد شرائح</p>
                                <button onclick="addSlide()" 
                                        class="mt-4 inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded transition">
                                    إضافة أول شريحة
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- منطقة التحرير الرئيسية -->
            <div class="flex-1 flex flex-col">
                
                <!-- شريط أدوات التحرير -->
                <div class="bg-white dark:bg-slate-800 border-b border-gray-200 dark:border-gray-700 p-4">
                    <div class="flex items-center space-x-4">
                        <!-- أدوات النص -->
                        <div class="flex items-center space-x-2">
                            <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600 rounded transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                            <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600 rounded transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </button>
                            <button class="p-2 hover:bg-gray-100 dark:hover:bg-gray-600 rounded transition">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </button>
                        </div>
                        
                        <div class="border-l border-gray-300 dark:border-gray-600 h-6"></div>
                        
                        <!-- أدوات التخطيط -->
                        <div class="flex items-center space-x-2">
                            <select class="text-sm border border-gray-300 dark:border-gray-600 rounded px-3 py-1 bg-white dark:bg-gray-700">
                                <option>تخطيط عنوان</option>
                                <option>تخطيط محتوى</option>
                                <option>تخطيط صورة</option>
                                <option>تخطيط مخطط</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- منطقة المعاينة -->
                <div class="flex-1 bg-gray-100 dark:bg-gray-900 p-8 overflow-auto">
                    <div class="max-w-4xl mx-auto">
                        <!-- معاينة الشريحة -->
                        <div id="slide-preview" class="aspect-video bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-8">
                            <div class="h-full flex items-center justify-center text-gray-500 dark:text-gray-400">
                                <div class="text-center">
                                    <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286"></path>
                                    </svg>
                                    <p class="mt-4 text-lg">اختر شريحة لتحريرها</p>
                                    <p class="text-sm">أو أضف شريحة جديدة للبدء</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let currentSlideIndex = 0;
        let slides = @json($presentation->slides ? json_decode($presentation->slides, true)['slides'] : []);

        function addSlide() {
            const newSlide = {
                type: 'content',
                title: 'شريحة جديدة',
                content: ''
            };
            slides.push(newSlide);
            updateSlidesList();
            selectSlide(slides.length - 1);
        }

        function deleteSlide(index) {
            if (confirm('هل أنت متأكد من حذف هذه الشريحة؟')) {
                slides.splice(index, 1);
                updateSlidesList();
                if (currentSlideIndex >= slides.length) {
                    currentSlideIndex = Math.max(0, slides.length - 1);
                }
                if (slides.length > 0) {
                    selectSlide(currentSlideIndex);
                } else {
                    clearSlidePreview();
                }
            }
        }

        function selectSlide(index) {
            currentSlideIndex = index;
            updateSlidePreview();
            
            // تحديث التحديد المرئي
            document.querySelectorAll('.slide-item').forEach((item, i) => {
                if (i === index) {
                    item.classList.add('bg-blue-50', 'dark:bg-blue-900', 'border-blue-500');
                } else {
                    item.classList.remove('bg-blue-50', 'dark:bg-blue-900', 'border-blue-500');
                }
            });
        }

        function updateSlidesList() {
            const slidesList = document.getElementById('slides-list');
            slidesList.innerHTML = '';
            
            slides.forEach((slide, index) => {
                const slideElement = document.createElement('div');
                slideElement.className = 'slide-item p-3 border border-gray-200 dark:border-gray-600 rounded-lg cursor-pointer hover:bg-gray-50 dark:hover:bg-gray-700 transition';
                slideElement.onclick = () => selectSlide(index);
                
                slideElement.innerHTML = `
                    <div class="flex items-center justify-between">
                        <span class="text-sm font-medium text-gray-900 dark:text-white">
                            ${index + 1}. ${slide.title || 'شريحة فارغة'}
                        </span>
                        <button onclick="deleteSlide(${index})" class="text-red-500 hover:text-red-700 transition">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                        </button>
                    </div>
                    <div class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        ${slide.type || 'محتوى'}
                    </div>
                `;
                
                slidesList.appendChild(slideElement);
            });
        }

        function updateSlidePreview() {
            const preview = document.getElementById('slide-preview');
            if (slides.length === 0 || currentSlideIndex >= slides.length) {
                clearSlidePreview();
                return;
            }
            
            const slide = slides[currentSlideIndex];
            let content = '';
            
            switch (slide.type) {
                case 'title':
                    content = `
                        <div class="h-full flex flex-col justify-center text-center">
                            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">${slide.title || 'عنوان العرض التقديمي'}</h1>
                            ${slide.subtitle ? `<p class="text-xl text-gray-600 dark:text-gray-400">${slide.subtitle}</p>` : ''}
                        </div>
                    `;
                    break;
                case 'content':
                default:
                    content = `
                        <div class="h-full">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">${slide.title || 'عنوان الشريحة'}</h2>
                            <div class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
                                ${slide.content || 'محتوى الشريحة...'}
                            </div>
                        </div>
                    `;
                    break;
            }
            
            preview.innerHTML = content;
        }

        function clearSlidePreview() {
            const preview = document.getElementById('slide-preview');
            preview.innerHTML = `
                <div class="h-full flex items-center justify-center text-gray-500 dark:text-gray-400">
                    <div class="text-center">
                        <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 48 48">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M34 40h10v-4a6 6 0 00-10.712-3.714M34 40H14m20 0v-4a9.971 9.971 0 00-.712-3.714M14 40H4v-4a6 6 0 0110.713-3.714M14 40v-4c0-1.313.253-2.566.713-3.714m0 0A10.003 10.003 0 0124 26c4.21 0 7.813 2.602 9.288 6.286"></path>
                        </svg>
                        <p class="mt-4 text-lg">اختر شريحة لتحريرها</p>
                        <p class="text-sm">أو أضف شريحة جديدة للبدء</p>
                    </div>
                </div>
            `;
        }

        function savePresentation() {
            const data = {
                slides: JSON.stringify({ slides: slides }),
                _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            };
            
            fetch(`/presentations/{{ $presentation->id }}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': data._token
                },
                body: JSON.stringify(data)
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // إظهار رسالة نجاح
                    showNotification('تم حفظ العرض التقديمي بنجاح', 'success');
                } else {
                    showNotification('حدث خطأ في الحفظ', 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showNotification('حدث خطأ في الحفظ', 'error');
            });
        }

        function previewPresentation() {
            window.open(`/presentations/{{ $presentation->id }}/preview`, '_blank');
        }

        function showNotification(message, type) {
            // يمكن إضافة نظام إشعارات هنا
            alert(message);
        }

        // تهيئة الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            updateSlidesList();
            if (slides.length > 0) {
                selectSlide(0);
            }
        });
    </script>
</x-layouts.app>
