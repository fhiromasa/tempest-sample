FROM php:8.5-fpm

# Composer
COPY --from=composer:2.9 /usr/bin/composer /usr/bin/composer
# Bun
COPY --from=bun:1.3-debian /usr/local/bin/bun /usr/local/bin/bun

RUN apt-get update && apt-get install -y \
    libzip-dev libpng-dev libjpeg-dev libfreetype6-dev libicu-dev libxml2-dev unzip

# install php extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg && \
    docker-php-ext-install -j$(nproc) pdo_mysql ftp zip intl gd bcmath pcntl soap
