# ============================================================
# 1️⃣ Stage 1: Node Build (React + Vite + Tailwind)
# ============================================================
FROM node:18-alpine AS frontend

WORKDIR /app

# Copy package files and install dependencies
COPY package*.json ./
RUN npm install

# Copy frontend source and build assets
COPY resources ./resources
COPY vite.config.* ./
RUN npm run build

# ============================================================
# 2️⃣ Stage 2: PHP / Laravel Backend
# ============================================================
FROM php:8.3-fpm-alpine

# Install dependencies
RUN apk add --no-cache bash git curl libpng-dev libjpeg-turbo-dev libwebp-dev libzip-dev oniguruma-dev zip unzip && \
    docker-php-ext-configure gd --with-jpeg --with-webp && \
    docker-php-ext-install pdo pdo_mysql mbstring gd zip

# Install Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy backend files
COPY . .

# Copy built frontend assets from the Node build stage
COPY --from=frontend /app/public/build ./public/build

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Generate key and optimize
RUN php artisan key:generate && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache

# For production automation (migrate)
CMD php artisan migrate --force && php-fpm
