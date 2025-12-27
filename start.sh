#!/bin/bash

echo "🚀 Starting Moukiess deployment..."

# Clear all caches
echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Wait for database
echo "Waiting for database..."
sleep 5

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Seed database if empty
echo "Seeding database..."
php artisan db:seed --force --class=ProductSeeder

# Start server
echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=$PORT
