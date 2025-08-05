<?php

namespace Database\Seeders;

use App\Models\Presentation;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Seeder;

class PresentationSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $templates = Template::all();

        if (!$user || $templates->isEmpty()) {
            return;
        }

        $presentations = [
            [
                'title' => 'خطة التسويق 2025',
                'description' => 'استراتيجية تسويقية شاملة للعام القادم',
                'template_id' => $templates->where('name', 'Marketing Strategy')->first()?->id,
                'slides' => json_encode([
                    'slides' => [
                        [
                            'type' => 'title',
                            'title' => 'خطة التسويق 2025',
                            'subtitle' => 'استراتيجية شاملة للنمو'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'تحليل السوق',
                            'content' => 'دراسة معمقة للسوق المحلي والعالمي مع تحديد الفرص الاستثمارية'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'الجمهور المستهدف',
                            'content' => 'تحديد شرائح العملاء الرئيسية وخصائصهم الديموغرافية'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'الأهداف والمؤشرات',
                            'content' => 'زيادة المبيعات بنسبة 30% وتحسين الوعي بالعلامة التجارية'
                        ]
                    ]
                ]),
                'status' => 'published',
                'views' => rand(50, 500)
            ],
            [
                'title' => 'عرض تقديمي للشركة',
                'description' => 'نظرة عامة على إنجازات الشركة وخططها المستقبلية',
                'template_id' => $templates->where('name', 'Corporate Presentation')->first()?->id,
                'slides' => json_encode([
                    'slides' => [
                        [
                            'type' => 'title',
                            'title' => 'شركة الابتكار التقني',
                            'subtitle' => 'الريادة في التكنولوجيا منذ 2010'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'من نحن',
                            'content' => 'شركة رائدة في مجال التكنولوجيا مع فريق من الخبراء المتخصصين'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'خدماتنا',
                            'content' => 'تطوير البرمجيات، الحلول السحابية، الاستشارات التقنية'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'إنجازاتنا',
                            'content' => 'أكثر من 100 مشروع ناجح و 50+ عميل راضي'
                        ]
                    ]
                ]),
                'status' => 'published',
                'views' => rand(100, 800)
            ],
            [
                'title' => 'مشروع التقنية الناشئة',
                'description' => 'عرض لمشروع تقني مبتكر يستهدف المستثمرين',
                'template_id' => $templates->where('name', 'Tech Startup')->first()?->id,
                'slides' => json_encode([
                    'slides' => [
                        [
                            'type' => 'title',
                            'title' => 'تطبيق الذكي للصحة',
                            'subtitle' => 'ثورة في مجال الرعاية الصحية الرقمية'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'المشكلة',
                            'content' => 'صعوبة متابعة الحالة الصحية والحصول على استشارات طبية سريعة'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'الحل',
                            'content' => 'تطبيق ذكي يربط المرضى بالأطباء ويوفر متابعة صحية دقيقة'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'السوق المستهدف',
                            'content' => '10 مليون مستخدم محتمل في المنطقة مع نمو سنوي 25%'
                        ]
                    ]
                ]),
                'status' => 'draft',
                'views' => rand(10, 100)
            ],
            [
                'title' => 'دورة تعلم البرمجة',
                'description' => 'برنامج تدريبي شامل لتعلم أساسيات البرمجة',
                'template_id' => $templates->where('name', 'Education Course')->first()?->id,
                'slides' => json_encode([
                    'slides' => [
                        [
                            'type' => 'title',
                            'title' => 'تعلم البرمجة من الصفر',
                            'subtitle' => 'رحلة شاملة لاحتراف التطوير'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'أهداف الدورة',
                            'content' => 'إتقان أساسيات البرمجة وبناء تطبيقات حقيقية'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'المنهج',
                            'content' => 'HTML, CSS, JavaScript, React, Node.js, وقواعد البيانات'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'المخرجات',
                            'content' => 'شهادة معتمدة ومشاريع عملية للمحفظة المهنية'
                        ]
                    ]
                ]),
                'status' => 'published',
                'views' => rand(200, 1000)
            ],
            [
                'title' => 'معرض الأعمال الفنية',
                'description' => 'عرض لمجموعة أعمال فنية إبداعية',
                'template_id' => $templates->where('name', 'Creative Portfolio')->first()?->id,
                'slides' => json_encode([
                    'slides' => [
                        [
                            'type' => 'title',
                            'title' => 'معرض الفن المعاصر',
                            'subtitle' => 'رؤية فنية جديدة للعالم'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'عن الفنان',
                            'content' => 'فنان متخصص في الفن المعاصر مع خبرة 15 عام'
                        ],
                        [
                            'type' => 'gallery',
                            'title' => 'الأعمال المميزة',
                            'content' => 'مجموعة من اللوحات التي تعكس روح العصر'
                        ],
                        [
                            'type' => 'content',
                            'title' => 'المعرض',
                            'content' => 'يقام المعرض في قاعة الفنون من 15-30 أغسطس'
                        ]
                    ]
                ]),
                'status' => 'published',
                'views' => rand(80, 400)
            ]
        ];

        foreach ($presentations as $presentationData) {
            Presentation::create([
                'title' => $presentationData['title'],
                'description' => $presentationData['description'],
                'user_id' => $user->id,
                'template_id' => $presentationData['template_id'],
                'slides' => $presentationData['slides'],
                'status' => $presentationData['status'],
                'views' => $presentationData['views'],
                'last_edited' => now()->subDays(rand(1, 30))
            ]);
        }
    }
}
