FROM php:7.4-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

COPY ./app /var/www/app/

WORKDIR /var/www/app