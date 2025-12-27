#!/bin/bash

echo "🚀 Starting Moukiess deployment..."

# Clear all caches
echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Wait for database to be ready
echo "Waiting for database..."
php wait-for-db.php

if [ $? -ne 0 ]; then
    echo "❌ Database not ready, exiting..."
    exit 1
fi

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Seed database if empty
echo "Seeding database..."
php artisan db:seed --force --class=ProductSeeder

# Start server
echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=$PORT
