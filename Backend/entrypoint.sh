#!/bin/sh
set -e

mkdir -p /var/www/html/storage/framework/sessions
mkdir -p /var/www/html/storage/framework/views
mkdir -p /var/www/html/storage/framework/cache

chown -R www-data:www-data /var/www/html/storage
chmod -R 775 /var/www/html/storage
chmod +x /var/www/html/artisan

exec "$@"