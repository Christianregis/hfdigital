# ─── Stage 1 : Build des assets frontend ───────────────────────────────────
FROM node:20-alpine AS frontend
WORKDIR /app
COPY package*.json ./
RUN npm ci
COPY . .
RUN npm run build

# ─── Stage 2 : Application Laravel ─────────────────────────────────────────
FROM php:8.2-fpm-alpine AS app

# Extensions PHP nécessaires pour Laravel + PostgreSQL
RUN apk add --no-cache \
    postgresql-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
  && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    gd \
    zip \
    opcache

# Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Dépendances PHP
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Code source + assets compilés
COPY . .
COPY --from=frontend /app/public/build ./public/build

# Permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage \
    && chmod -R 755 /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
