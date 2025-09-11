#!/bin/bash

rsync -a /var/www/cache/vendor/ /var/www/vendor/

php artisan migrate

php-fpm
