FROM php:7.4-alpine

RUN apk add --no-cache curl
    
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

CMD [ "composer", "install" ]