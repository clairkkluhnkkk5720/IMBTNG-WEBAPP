FROM php:latest

RUN apt-get update \
    && apt-get install -y \
        libpng-dev \
        libjpeg-dev  \
        curl \
        sed \
        zlib1g-dev
RUN docker-php-ext-install pdo pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN useradd -ms /bin/bash app
USER app

WORKDIR /app/
