<?php

require_once 'vendor/autoload.php';

use App\Models\Presentation;
use Illuminate\Support\Facades\DB;

// بدء Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

// محاكاة بيانات AI presentation
$testData = [
    'title' => 'AI Test Presentation - Business Strategy',
    'type' => 'business',
    'theme' => 'corporate',
    'slides' => [
        ['title' => 'Executive Summary', 'content' => 'High-level overview', 'type' => 'title'],
        ['title' => 'Problem Statement', 'content' => 'What problem are we solving?', 'type' => 'content'],
        ['title' => 'Solution Overview', 'content' => 'Our innovative solution', 'type' => 'content'],
        ['title' => 'Market Analysis', 'content' => 'Target market and opportunities', 'type' => 'data'],
        ['title' => 'Business Model', 'content' => 'How we make money', 'type' => 'diagram'],
    ],
    'slideCount' => 5,
    'estimatedDuration' => 10
];

echo "Testing AI Presentation Creation...\n";

try {
    // إنشاء user تجريبي إذا لم يكن موجود
    $user = DB::table('users')->first();
    if (!$user) {
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        $user = DB::table('users')->first();
    }
    
    echo "User found: {$user->name} (ID: {$user->id})\n";
    
    // إنشاء presentation
    $presentation = Presentation::create([
        'title' => $testData['title'],
        'description' => "AI-generated {$testData['type']} presentation with {$testData['slideCount']} slides",
        'user_id' => $user->id,
        'status' => 'draft',
        'file_type' => 'ai_generated',
        'ai_metadata' => [
            'presentation_type' => $testData['type'],
            'theme' => $testData['theme'],
            'slide_count' => $testData['slideCount'],
            'estimated_duration' => $testData['estimatedDuration'],
            'created_by_ai' => true,
            'generation_timestamp' => now()->toISOString(),
            'slides_structure' => $testData['slides']
        ]
    ]);
    
    echo "✅ AI Presentation created successfully!\n";
    echo "Presentation ID: {$presentation->id}\n";
    echo "Title: {$presentation->title}\n";
    echo "Type: {$presentation->ai_metadata['presentation_type']}\n";
    echo "Slides: {$presentation->ai_metadata['slide_count']}\n";
    echo "Duration: {$presentation->ai_metadata['estimated_duration']} minutes\n";
    
    // عرض بنية الشرائح
    echo "\nSlides Structure:\n";
    foreach ($presentation->ai_metadata['slides_structure'] as $index => $slide) {
        echo ($index + 1) . ". {$slide['title']} ({$slide['type']})\n";
    }
    
    // فحص قاعدة البيانات
    $count = Presentation::where('file_type', 'ai_generated')->count();
    echo "\nTotal AI presentations in database: {$count}\n";
    
} catch (Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}
