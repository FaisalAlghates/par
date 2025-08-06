<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use Illuminate\Support\Facades\Auth;

echo "🔐 اختبار وظيفة logout:\n";
echo "=========================\n\n";

// التحقق من وجود مستخدم مسجل دخول
if (Auth::check()) {
    $user = Auth::user();
    echo "✅ المستخدم المسجل حالياً: {$user->name} ({$user->email})\n";
    echo "✅ ID المستخدم: {$user->id}\n\n";
    
    echo "🔄 اختبار logout...\n";
    
    // محاولة logout
    Auth::logout();
    
    // التحقق من logout
    if (!Auth::check()) {
        echo "✅ تم logout بنجاح!\n";
        echo "✅ لا يوجد مستخدم مسجل دخول حالياً\n";
    } else {
        echo "❌ فشل في logout!\n";
    }
} else {
    echo "ℹ️  لا يوجد مستخدم مسجل دخول حالياً\n\n";
    
    echo "🔄 تسجيل دخول تجريبي...\n";
    
    // محاولة تسجيل دخول للاختبار
    if (Auth::attempt(['email' => 'dfsdrge@gmail.com', 'password' => 'password'])) {
        $user = Auth::user();
        echo "✅ تم تسجيل الدخول بنجاح: {$user->name}\n\n";
        
        echo "🔄 اختبار logout...\n";
        Auth::logout();
        
        if (!Auth::check()) {
            echo "✅ تم logout بنجاح!\n";
        } else {
            echo "❌ فشل في logout!\n";
        }
    } else {
        echo "❌ فشل في تسجيل الدخول التجريبي\n";
    }
}

echo "\n=========================\n";
echo "✅ انتهى اختبار logout\n";
