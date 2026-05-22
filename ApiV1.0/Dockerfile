FROM php:7.4-apache

# Instala dependências
RUN apt-get update && apt-get install -y \
    git unzip curl \
    && docker-php-ext-install pdo pdo_mysql

# Ativa mod_rewrite ativa o Laravel
RUN a2enmod rewrite

# Permite uso de .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Define pasta pública do Laravel
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Ajusta Apache para usar /public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY backend/ /var/www/html/

WORKDIR /var/www/html

RUN composer install --no-dev --optimize-autoloader