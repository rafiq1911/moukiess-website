#!/bin/bash

echo "🚀 Starting Moukiess deployment..."

# Clear all caches
echo "Clearing caches..."
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear

# Create SQLite database file if not exists
echo "Setting up SQLite database..."
touch /app/database/database.sqlite
chmod 664 /app/database/database.sqlite

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Seed database if empty
echo "Seeding database..."
php artisan db:seed --force --class=ProductSeeder

# Start server
echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=$PORT
