FROM php:7.4-alpine

WORKDIR /var/www/app

RUN apk update && \
    apk add --no-cache curl
    
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
    
RUN apk del curl && \
    composer update --no-interaction --no-autoloader && composer clear-cache && \
    composer dump-autoload

VOLUME /var/www/app

CMD ["composer", "--working-dir=/var/www/app"]