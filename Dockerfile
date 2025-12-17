# 1. Use PHP 8.4
FROM php:8.4-fpm

# 2. Install system dependencies
RUN apt-get update && apt-get install -y \
    nginx \
    supervisor \
    curl \
    gnupg \
    git \
    zip \
    unzip \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# 3. Install PHP Extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# 4. Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# 5. Set working directory
WORKDIR /app

# 6. Copy files and install dependencies
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction
RUN npm ci && npm run build

# 7. Configure Permissions (Updated to include /app/database)
RUN chown -R www-data:www-data /app/storage /app/bootstrap/cache /app/database

# 8. Setup Configuration files
# Nginx Config
RUN echo 'server { \
    listen 80; \
    root /app/public; \
    index index.php index.html; \
    server_name _; \
    client_max_body_size 100M; \
    location / { try_files $uri $uri/ /index.php?$query_string; } \
    location ~ \.php$ { include fastcgi_params; fastcgi_pass 127.0.0.1:9000; fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name; } \
}' > /etc/nginx/sites-available/default

# Supervisor Config
RUN echo '[supervisord] \n\
nodaemon=true \n\
user=root \n\
\n\
[program:php-fpm] \n\
command=php-fpm \n\
stdout_logfile=/dev/stdout \n\
stdout_logfile_maxbytes=0 \n\
stderr_logfile=/dev/stderr \n\
stderr_logfile_maxbytes=0 \n\
\n\
[program:nginx] \n\
command=nginx -g "daemon off;" \n\
stdout_logfile=/dev/stdout \n\
stdout_logfile_maxbytes=0 \n\
stderr_logfile=/dev/stderr \n\
stderr_logfile_maxbytes=0 \n\
\n\
[program:worker] \n\
command=php /app/artisan queue:work --sleep=3 --tries=3 \n\
autostart=true \n\
autorestart=true \n\
stopasgroup=true \n\
killasgroup=true \n\
numprocs=1 \n\
redirect_stderr=true \n\
stdout_logfile=/dev/stdout \n\
stopwaitsecs=3600 \n\
' > /etc/supervisor/conf.d/supervisord.conf

# 9. Create Startup Script (Updated to include /app/database)
RUN echo '#!/bin/bash \n\
# Fix permissions for storage and database \n\
chown -R www-data:www-data /app/storage /app/bootstrap/cache /app/database \n\
\n\
# Ensure storage link exists \n\
php artisan storage:link \n\
\n\
# Create database.sqlite if it does not exist (for SQLite users) \n\
touch /app/database/database.sqlite && chown www-data:www-data /app/database/database.sqlite \n\
\n\
# Run migrations (Optional: good for "set and forget") \n\
php artisan migrate --force \n\
\n\
# Start Supervisor \n\
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf \n\
' > /start.sh && chmod +x /start.sh

# 10. Start Command
CMD ["/start.sh"]
