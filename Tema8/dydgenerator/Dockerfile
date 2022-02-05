FROM php:8.0-apache

RUN apt-get update && apt-get install --yes --no-install-recommends \
    && apt-get install openssl libssl-dev libcurl4-openssl-dev -y \
    && pecl channel-update pecl.php.net\
    && pecl install mongodb \   
    && docker-php-ext-enable mongodb

WORKDIR /var/www/html/