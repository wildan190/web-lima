#!/bin/sh
set -e

echo "Waiting for database..."
until nc -z db 3306; do
  sleep 2
done

cd /var/www

# Install dependencies if missing
if [ ! -d "vendor" ]; then
    echo "Installing composer..."
    composer install --no-interaction --optimize-autoloader
fi

echo "Fix permissions..."
chown -R www-data:www-data storage bootstrap/cache

echo "Running migrations..."
php artisan migrate --force || true

echo "Link storage..."
php artisan storage:link || true

echo "Starting PHP-FPM..."
exec php-fpm