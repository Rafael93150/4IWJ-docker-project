FROM php:fpm-alpine3.17

RUN apk --no-cache add postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql