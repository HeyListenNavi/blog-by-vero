# ---------------------------------------------------------------
# Stage 1: Install Composer Dependencies
# ---------------------------------------------------------------
FROM composer:2 AS composer_build

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --no-dev \
    --prefer-dist \
    --ignore-platform-req=ext-intl

COPY . .
RUN composer dump-autoload --optimize

# ---------------------------------------------------------------
# Stage 2: Build Frontend Assets (Vite/Node)
# ---------------------------------------------------------------
FROM node:20-alpine AS node_builder

WORKDIR /app

COPY package*.json vite.config.js ./
RUN npm ci

COPY . .
COPY --from=composer_build /app/vendor ./vendor

RUN npm run build

# ---------------------------------------------------------------
# Stage 3: Production Web Server (Serversideup)
# ---------------------------------------------------------------
FROM serversideup/php:8.4-fpm-nginx

USER root

RUN rm -f /etc/apt/sources.list.d/nginx.list \
    && apt-get update \
    && install-php-extensions intl

WORKDIR /var/www/html

COPY . .

COPY --from=composer_build /app/vendor ./vendor

COPY --from=node_builder /app/public/build ./public/build

RUN rm -f public/hot

RUN php artisan storage:link

RUN chown -R www-data:www-data /var/www/html

USER www-data
