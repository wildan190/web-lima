#!/bin/sh
set -e

# Wait for DB to be ready
echo "Waiting for database to be ready..."
until nc -z db 3306; do
  echo "DB is unavailable - sleeping"
  sleep 2
done

# Install dependencies if vendor is missing
if [ ! -d "/var/www/vendor" ]; then
    echo "Installing composer dependencies..."
    # Fix dubious ownership for git in composer
    git config --global --add safe.directory /var/www
    composer install --no-interaction --optimize-autoloader
fi

# Fix storage permissions
echo "Setting permissions..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Create storage link
echo "Creating storage link..."
php artisan storage:link --force

echo "Application is ready. Starting PHP-FPM..."
exec php-fpm
