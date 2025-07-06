<?php

// Simple migration script for production
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

// Run migrations
echo "Running migrations...\n";
$exitCode = Artisan::call('migrate', ['--force' => true]);

if ($exitCode === 0) {
    echo "✅ Migrations completed successfully!\n";
} else {
    echo "❌ Migration failed!\n";
}

// Create admin user if not exists
echo "Creating admin user...\n";
try {
    $user = \App\Models\User::where('email', 'admin@yopmail.com')->first();
    if (!$user) {
        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@yopmail.com',
            'password' => bcrypt('nmdp7788'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
        echo "✅ Admin user created successfully!\n";
    } else {
        echo "ℹ️ Admin user already exists.\n";
    }
} catch (Exception $e) {
    echo "❌ Error creating admin user: " . $e->getMessage() . "\n";
}

echo "🎉 Setup completed!\n";
