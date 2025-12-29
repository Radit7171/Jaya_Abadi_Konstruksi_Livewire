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

RUN apt-get update && apt-get install -y \
    git zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif bcmath gd

# 🔥 FIX: HAPUS SEMUA MPM TERLEBIH DAHULU, LALU AKTIFKAN SATU SAJA
RUN rm -f /etc/apache2/mods-enabled/mpm_*.load \
    && a2dismod mpm_event mpm_worker 2>/dev/null || true

# AKTIFKAN HANYA MPM PREFORK (required for PHP with mod_php)
RUN a2enmod mpm_prefork

# AKTIFKAN MODUL LAIN YANG DIBUTUHKAN
RUN a2enmod rewrite

# Pastikan konfigurasi Apache menggunakan document root yang benar
RUN sed -i 's|/var/www/html|/var/www/html/public|g' \
    /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

COPY . .
COPY --from=frontend /app/public/build public/build

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80
