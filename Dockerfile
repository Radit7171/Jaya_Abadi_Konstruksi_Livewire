# =========================
# STAGE 1: Build Frontend
# =========================
FROM node:20-alpine AS frontend

WORKDIR /app

COPY package*.json ./
RUN npm install

COPY resources resources
COPY vite.config.js .
RUN npm run build

# =========================
# STAGE 2: PHP + Apache
# =========================
FROM php:8.4-apache

# System deps
RUN apt-get update && apt-get install -y \
    git zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif bcmath gd

# Apache rewrite
RUN a2enmod rewrite

# Set document root ke /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' \
    /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

# Copy backend
COPY . .

# Copy built frontend assets
COPY --from=frontend /app/public/build public/build

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Permission Laravel
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
