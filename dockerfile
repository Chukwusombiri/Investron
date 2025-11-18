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
COPY vite.config.js tailwind.config.js postcss.config.js jsconfig.json ./
RUN npm run build

# ============================================================
# 2️⃣ Stage 2: PHP / Laravel Backend
# ============================================================
FROM php:8.3-fpm-alpine AS backend

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
#COPY --from=frontend /app/public/build ./public/build

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set Laravel permissions
RUN chown -R www-data:www-data storage bootstrap/cache

# Generate key and optimize
RUN php artisan key:generate

# For production automation (migrate)
CMD ["php-fpm"]


# NGINX set up in a separate container to serve the application
# ============================================================
# 3️⃣ Stage 3: NGINX Setup
# ============================================================
FROM nginx:alpine AS webserver
COPY ./docker/nginx/default.conf /etc/nginx/nginx.conf
COPY --from=backend /var/www/html /var/www/html
EXPOSE 80
CMD ["nginx", "-g", "daemon off;"]
