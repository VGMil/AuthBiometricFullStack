FROM php:8.2-fpm-alpine

# Instalar dependencias necesarias
RUN apk update && apk add \
    curl \
    libpng-dev \
    libxml2-dev \
    zip \
    unzip

# Instalar extensiones de PHP necesarias
RUN docker-php-ext-install pdo pdo_mysql \
    && apk --no-cache add nodejs npm

# Copiar Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Cambiar a usuario root para modificar permisos
USER root

# Crear directorios necesarios y establecer permisos
RUN mkdir -p /var/www/html/storage /var/www/html/bootstrap/cache && \
    chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Establecer el directorio de trabajo
WORKDIR /var/www

# Cambiar al usuario www-data para ejecutar Laravel
USER www-data
