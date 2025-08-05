<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Presentation;
use App\Models\Category;
use App\Models\Review;

echo "🔍 فحص قاعدة البيانات parhub:\n";
echo "========================================\n";

// التحقق من الاتصال
try {
    $dbName = DB::connection()->getDatabaseName();
    echo "✅ متصل بقاعدة البيانات: {$dbName}\n\n";
    
    // فحص جدول المستخدمين
    echo "👤 جدول المستخدمين (users):\n";
    $users = User::select('id', 'name', 'email', 'created_at')->get();
    echo "   - العدد الكلي: " . $users->count() . " مستخدم\n";
    foreach ($users as $user) {
        echo "   - ID: {$user->id}, الاسم: {$user->name}, الإيميل: {$user->email}\n";
    }
    echo "\n";
    
    // فحص جدول العروض التقديمية
    echo "📊 جدول العروض التقديمية (presentations):\n";
    $presentations = Presentation::select('id', 'title', 'user_id', 'created_at')->get();
    echo "   - العدد الكلي: " . $presentations->count() . " عرض تقديمي\n";
    foreach ($presentations->take(5) as $presentation) {
        echo "   - ID: {$presentation->id}, العنوان: {$presentation->title}, المستخدم: {$presentation->user_id}\n";
    }
    echo "\n";
    
    // فحص جدول الفئات
    echo "📂 جدول الفئات (categories):\n";
    $categories = Category::select('id', 'name', 'created_at')->get();
    echo "   - العدد الكلي: " . $categories->count() . " فئة\n";
    foreach ($categories as $category) {
        echo "   - ID: {$category->id}, الاسم: {$category->name}\n";
    }
    echo "\n";
    
    // فحص جدول المراجعات
    echo "⭐ جدول المراجعات (reviews):\n";
    $reviews = Review::select('id', 'rating', 'user_id', 'created_at')->get();
    echo "   - العدد الكلي: " . $reviews->count() . " مراجعة\n";
    foreach ($reviews->take(5) as $review) {
        echo "   - ID: {$review->id}, التقييم: {$review->rating}, المستخدم: {$review->user_id}\n";
    }
    echo "\n";
    
    // فحص الجداول الأخرى
    echo "📊 إحصائيات عامة:\n";
    $tables = ['users', 'presentations', 'categories', 'reviews', 'templates', 'slides', 'documents'];
    foreach ($tables as $table) {
        try {
            $count = DB::table($table)->count();
            echo "   - {$table}: {$count} سجل\n";
        } catch (Exception $e) {
            echo "   - {$table}: غير متوفر\n";
        }
    }
    
} catch (Exception $e) {
    echo "❌ خطأ في الاتصال: " . $e->getMessage() . "\n";
}

echo "\n========================================\n";
echo "✅ انتهى فحص قاعدة البيانات\n";
