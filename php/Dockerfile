FROM php:7.4-fpm-alpine

RUN apk update && apk add --no-cache \
    libpq \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

WORKDIR /var/www/app

COPY ./app /var/www/app/

CMD ["php-fpm"]