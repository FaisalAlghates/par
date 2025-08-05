<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $templates = Template::all();

        if ($users->isEmpty() || $templates->isEmpty()) {
            return;
        }

        $reviews = [
            [
                'rating' => 5,
                'comment' => 'قالب ممتاز ومفيد جداً، ساعدني في إنشاء عرض تقديمي رائع لشركتي.',
                'is_approved' => true
            ],
            [
                'rating' => 4,
                'comment' => 'تصميم جميل ومرن، لكن أتمنى لو كان هناك المزيد من الألوان.',
                'is_approved' => true
            ],
            [
                'rating' => 5,
                'comment' => 'Perfect template! Very professional and easy to customize.',
                'is_approved' => true
            ],
            [
                'rating' => 3,
                'comment' => 'جيد ولكن يحتاج لبعض التحسينات في التخطيط.',
                'is_approved' => true
            ],
            [
                'rating' => 5,
                'comment' => 'Amazing design! Helped me create a stunning presentation.',
                'is_approved' => true
            ],
            [
                'rating' => 4,
                'comment' => 'قالب رائع للعروض التجارية، أنصح به بشدة.',
                'is_approved' => true
            ],
            [
                'rating' => 5,
                'comment' => 'Excellent quality and very user-friendly. Great work!',
                'is_approved' => true
            ],
            [
                'rating' => 4,
                'comment' => 'تصميم احترافي ومنظم، سهل الاستخدام.',
                'is_approved' => true
            ],
            [
                'rating' => 5,
                'comment' => 'مثالي للعروض الأكاديمية، شكراً للمطورين.',
                'is_approved' => true
            ],
            [
                'rating' => 4,
                'comment' => 'Good template with nice animations and transitions.',
                'is_approved' => true
            ],
            [
                'rating' => 5,
                'comment' => 'Outstanding! Best template I have used so far.',
                'is_approved' => true
            ],
            [
                'rating' => 3,
                'comment' => 'لا بأس به ولكن يمكن أن يكون أفضل مع المزيد من الخيارات.',
                'is_approved' => true
            ],
            [
                'rating' => 5,
                'comment' => 'Perfect for marketing presentations. Highly recommended!',
                'is_approved' => true
            ],
            [
                'rating' => 4,
                'comment' => 'تصميم عصري وجذاب، يناسب العروض الحديثة.',
                'is_approved' => true
            ],
            [
                'rating' => 5,
                'comment' => 'Fantastic template with great attention to detail.',
                'is_approved' => true
            ]
        ];

        foreach ($reviews as $reviewData) {
            // Get random user and template
            $user = $users->random();
            $template = $templates->random();

            // Check if review already exists
            $exists = Review::where('user_id', $user->id)
                           ->where('template_id', $template->id)
                           ->exists();

            if (!$exists) {
                Review::create([
                    'user_id' => $user->id,
                    'template_id' => $template->id,
                    'rating' => $reviewData['rating'],
                    'comment' => $reviewData['comment'],
                    'is_approved' => $reviewData['is_approved']
                ]);
            }
        }

        // Update template ratings based on reviews
        foreach ($templates as $template) {
            $avgRating = $template->reviews()->approved()->avg('rating');
            if ($avgRating) {
                $template->update(['rating' => round($avgRating, 1)]);
            }
        }
    }
}
