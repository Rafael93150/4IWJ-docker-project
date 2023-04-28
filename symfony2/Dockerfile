FROM php:8.1-fpm-alpine

# Update and install dependencies
RUN apk update && apk add \
    git \
    unzip \
    libzip-dev \
    libpq \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Set working directory
WORKDIR /var/www/html

# Copy files
COPY . .

# Install composer dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-scripts --no-autoloader

# Copy over the custom PHP configuration
COPY docker/php.ini /usr/local/etc/php/conf.d/docker-php.ini

# Generate autoload files
RUN composer dump-autoload --optimize --no-dev --classmap-authoritative

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]