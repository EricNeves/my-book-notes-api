FROM php:8.2-fpm-alpine

WORKDIR /var/cache

RUN apk --no-cache add \
    $PHPIZE_DEPS \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    curl \
    rsync

RUN docker-php-ext-install pdo pdo_pgsql

COPY --from=composer:2.7 /usr/bin/composer /usr/local/bin/composer

COPY composer.json composer.lock ./

RUN composer install --no-interaction --prefer-dist --optimize-autoloader --no-scripts

WORKDIR /var/www

COPY . .

EXPOSE 9000

CMD ["sh", "infrastructure/start.sh"]
