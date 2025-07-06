#!/bin/bash

# Laravel Deployment Script for Production

echo "🚀 Starting Laravel deployment preparation..."

# Install dependencies
echo "📦 Installing Composer dependencies..."
composer install --optimize-autoloader --no-dev

# Install Node.js dependencies
echo "📦 Installing Node.js dependencies..."
npm install

# Build assets
echo "🏗️ Building production assets..."
npm run build

# Generate application key if not set
echo "🔑 Generating application key..."
php artisan key:generate --force

# Clear and cache configurations
echo "🧹 Clearing caches..."
php artisan config:clear
php artisan route:clear
php artisan view:clear
php artisan cache:clear

echo "📝 Caching configurations for production..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Run database migrations
echo "🗄️ Running database migrations..."
php artisan migrate --force

# Create storage link
echo "🔗 Creating storage link..."
php artisan storage:link

# Set proper permissions
echo "🔒 Setting proper permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

echo "✅ Deployment preparation completed!"
echo "🌐 Your Laravel application is ready for production!"
