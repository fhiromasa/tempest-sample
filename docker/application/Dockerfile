FROM php:8.4-apache

# Composer
COPY --from=composer:2.8 /usr/bin/composer /usr/bin/composer

RUN apt-get update && apt-get install -y \
    libzip-dev libpng-dev libjpeg-dev libfreetype6-dev  libicu-dev libxml2-dev

# install php extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) pdo_mysql ftp zip intl gd bcmath opcache pcntl soap

RUN a2enmod rewrite

COPY ./000-default.conf /etc/apache2/sites-available/
