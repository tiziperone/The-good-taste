FROM php:8.4-fpm-alpine

# Instalar dependencias del sistema y extensiones de PHP
RUN apk add --no-cache \
    nginx \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    oniguruma-dev \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Copiar archivos del proyecto
COPY . .

# Copiar configuración de Nginx al contenedor
COPY nginx.conf /etc/nginx/http.d/default.conf

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Permisos para storage y cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Crear carpetas necesarias para Nginx en Alpine
RUN mkdir -p /run/nginx

EXPOSE 8080

# Compilar caché de Laravel, arrancar PHP-FPM de fondo y Nginx al frente
CMD sh -c "php artisan config:cache && php artisan route:cache && php artisan view:cache && php-fpm -D && nginx -g 'daemon off;'"