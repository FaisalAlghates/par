<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

// Get all users
$users = App\Models\User::all();

echo "Total users: " . $users->count() . PHP_EOL;
echo "Users list:" . PHP_EOL;

foreach ($users as $user) {
    echo "- Email: " . $user->email . " | Name: " . $user->name . " | Created: " . $user->created_at . PHP_EOL;
}

// Check if test user exists
$testUser = App\Models\User::where('email', 'test@test.com')->first();
if ($testUser) {
    echo PHP_EOL . "Test user exists: test@test.com" . PHP_EOL;
} else {
    echo PHP_EOL . "Test user does not exist. Creating one..." . PHP_EOL;
    
    $newUser = App\Models\User::create([
        'name' => 'Test User',
        'email' => 'test@test.com',
        'password' => Hash::make('password'),
        'email_verified_at' => now(),
    ]);
    
    echo "Test user created: " . $newUser->email . PHP_EOL;
}
