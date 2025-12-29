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
# STAGE 2: PHP + Apache (Railway Optimized)
# =========================
FROM php:8.4-apache

# 1. INSTALL DEPENDENCIES FIRST
RUN apt-get update && apt-get install -y \
    git zip unzip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif bcmath gd

# 2. FIX MPM ISSUE ONCE AND FOR ALL (Railway Safe)
# Remove ALL MPM symlinks first
RUN rm -rf /etc/apache2/mods-enabled/mpm_*.load /etc/apache2/mods-enabled/mpm_*.conf

# Create ONLY prefork symlink manually (most reliable)
RUN ln -s /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/
RUN ln -s /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/ 2>/dev/null || true

# 3. CONFIGURE APACHE FOR RAILWAY
RUN a2enmod rewrite headers

# Set document root to /public
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Add ServerName to avoid warnings
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Optimize Apache for Railway's environment
RUN echo "<IfModule mpm_prefork_module>" > /etc/apache2/conf-available/railway-mpm.conf && \
    echo "    StartServers            2" >> /etc/apache2/conf-available/railway-mpm.conf && \
    echo "    MinSpareServers         2" >> /etc/apache2/conf-available/railway-mpm.conf && \
    echo "    MaxSpareServers         5" >> /etc/apache2/conf-available/railway-mpm.conf && \
    echo "    MaxRequestWorkers       30" >> /etc/apache2/conf-available/railway-mpm.conf && \
    echo "    MaxConnectionsPerChild  1000" >> /etc/apache2/conf-available/railway-mpm.conf && \
    echo "</IfModule>" >> /etc/apache2/conf-available/railway-mpm.conf

RUN a2enconf railway-mpm

WORKDIR /var/www/html

# 4. COPY APPLICATION
COPY . .
COPY --from=frontend /app/public/build public/build

# 5. INSTALL COMPOSER DEPENDENCIES
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# 6. SET PERMISSIONS
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# 7. VERIFICATION (optional - can remove in production)
RUN echo "=== Verifying MPM Configuration ===" && \
    ls -la /etc/apache2/mods-enabled/mpm_* && \
    apache2ctl -t 2>&1 | grep -q "Syntax OK" && echo "✓ Apache config test passed"

EXPOSE 80

# 8. HEALTH CHECK FOR RAILWAY
HEALTHCHECK --interval=30s --timeout=3s --start-period=10s --retries=3 \
    CMD curl -f http://localhost/ || exit 1

# 9. OPTIMIZE FOR RAILWAY DEPLOYMENT
# Enable Apache to listen on PORT env variable (Railway provides PORT)
RUN sed -i 's/Listen 80/Listen ${PORT:-80}/g' /etc/apache2/ports.conf
RUN sed -i 's/:80/:${PORT:-80}/g' /etc/apache2/sites-available/000-default.conf

# Start Apache in foreground
CMD ["apache2-foreground"]
