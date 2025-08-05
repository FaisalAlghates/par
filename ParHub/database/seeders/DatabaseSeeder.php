<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // إنشاء مستخدم تجريبي فقط إذا لم يكن موجوداً
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Test User',
                'email' => 'test@example.com',
            ]);
        }

        // إضافة بيانات التصنيفات والقوالب والعروض التقديمية
            public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            SimpleTemplateSeeder::class,
            PresentationSeeder::class,
            ReviewSeeder::class,
        ]);
    }
    }
}
