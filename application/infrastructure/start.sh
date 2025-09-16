#!/bin/bash

rsync -a /var/cache/vendor/ /var/www/vendor/

chmod -R ug+rwX storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

php artisan migrate

php-fpm
