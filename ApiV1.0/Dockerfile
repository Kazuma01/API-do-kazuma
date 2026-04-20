FROM php:7.4-apache

# Instala extensões necessárias
RUN apt-get update && apt-get install -y \
    git unzip curl \
    && docker-php-ext-install pdo pdo_mysql

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html