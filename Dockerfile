FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git curl unzip zip nano libpng-dev libjpeg-dev \
    libfreetype6-dev libzip-dev libonig-dev libxml2-dev \
    netcat-traditional \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN chown -R www-data:www-data /var/www

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 9000

ENTRYPOINT ["docker-entrypoint.sh"]