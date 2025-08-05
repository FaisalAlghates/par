<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

echo "Database: " . DB::connection()->getDatabaseName() . PHP_EOL;
echo "Users before: " . App\Models\User::count() . PHP_EOL;

// Test user creation
$newUser = App\Models\User::create([
    'name' => 'Test Registration User',
    'email' => 'test.register@parhub.com',
    'password' => Hash::make('password123'),
    'email_verified_at' => now(),
]);

echo "Users after: " . App\Models\User::count() . PHP_EOL;
echo "New user created: " . $newUser->name . " (" . $newUser->email . ")" . PHP_EOL;
echo "User ID: " . $newUser->id . PHP_EOL;

// Test other tables
echo "\nOther tables in parhub:" . PHP_EOL;
echo "Presentations: " . DB::table('presentations')->count() . PHP_EOL;
echo "Templates: " . DB::table('templates')->count() . PHP_EOL;
echo "Categories: " . DB::table('categories')->count() . PHP_EOL;
echo "Reviews: " . DB::table('reviews')->count() . PHP_EOL;
