#!/bin/bash

echo "🚀 Starting Vercel build for Laravel..."

# Set environment variables
export COMPOSER_ALLOW_SUPERUSER=1
export COMPOSER_NO_INTERACTION=1
export COMPOSER_MIRROR_PATH_REPOS=1

# Build frontend assets first
echo "📦 Installing Node.js dependencies..."
npm ci --only=production

echo "🏗️ Building frontend assets..."
npm run build

# Install PHP dependencies without dev packages
echo "📦 Installing Composer dependencies..."
composer install --optimize-autoloader --no-dev --no-interaction --prefer-dist

# Create necessary directories
echo "📁 Creating storage directories..."
mkdir -p storage/logs
mkdir -p storage/framework/cache
mkdir -p storage/framework/sessions  
mkdir -p storage/framework/views
mkdir -p bootstrap/cache

# Set proper permissions
echo "🔒 Setting permissions..."
chmod -R 755 storage
chmod -R 755 bootstrap/cache

echo "✅ Build completed successfully!"
