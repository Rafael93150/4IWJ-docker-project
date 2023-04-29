FROM php:fpm-alpine3.17

RUN apk update && apk add --no-cache \
    libpq \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/app

COPY ./app /var/www/app/

RUN composer update --no-interaction --no-autoloader && composer clear-cache

RUN composer dump-autoload

CMD ["php-fpm"]