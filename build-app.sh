#!/bin/bash

echo "Building Laravel app..."

# Install dependencies
composer install --no-dev --optimize-autoloader

# Build front-end (Vite)
npm install
npm run build

# Optimize Laravel (tanpa query DB)
php artisan config:cache
php artisan route:cache
php artisan view:cache

# ❌ Jangan jalankan ini di Railway build stage
# php artisan migrate --force
# php artisan optimize:clear
# php artisan cache:clear
# php artisan db:seed --force

echo "Build complete!"
