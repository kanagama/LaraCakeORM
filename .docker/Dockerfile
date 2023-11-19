FROM php:8.2.6-apache

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y \
    libonig-dev \
    libzip-dev \
    unzip \
    libxml2 \
    libicu-dev \
    zlib1g-dev \
    openssl \
    vim \
    && docker-php-ext-install \
    pdo_mysql \
    mbstring \
    zip \
    bcmath

RUN docker-php-ext-install opcache
RUN docker-php-ext-install intl

COPY . /var/www/html/
COPY .docker/apache/php.ini /usr/local/etc/php/php.ini
COPY .docker/apache/cert.pem /usr/local/etc/php/cert.pem
COPY .docker/apache/apache2.conf /etc/apache2/apache2.conf
RUN chmod -R 777 /var/www/html/storage/
RUN a2enmod rewrite
