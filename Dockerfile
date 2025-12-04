FROM php:8.2-fpm

WORKDIR /var/www/html

# Instalar dependencias del sistema y extensiones de PHP necesarias
RUN apt-get update && apt-get install -y \
    libpq-dev libzip-dev zip unzip git curl \
    && docker-php-ext-install pdo pdo_pgsql zip

# Instalar Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copiar proyecto
COPY . .

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Exponer puerto PHP-FPM
EXPOSE 8000

# Ejecutar PHP-FPM
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]