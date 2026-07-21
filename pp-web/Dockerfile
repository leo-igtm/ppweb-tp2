# Dockerfile for Laravel app (suitable for Render web service)
FROM php:8.2-fpm

ARG USER=www-data
ARG UID=1000

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libxml2-dev \
    libonig-dev \
    && docker-php-ext-configure gd --with-jpeg --with-freetype \
    && docker-php-ext-install gd pdo pdo_mysql mbstring exif pcntl bcmath zip xml \
    && rm -rf /var/lib/apt/lists/*

# Install Composer binary from official composer image
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress || composer install --no-interaction

# Copy app
COPY . .

# Ensure correct permissions for storage and cache
RUN chown -R ${USER}:${USER} /var/www \
    && chmod -R 755 /var/www/storage /var/www/bootstrap/cache || true

EXPOSE 8000

# Use Laravel's built-in server for simplicity (Render will route to $PORT)
ENV PORT 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
