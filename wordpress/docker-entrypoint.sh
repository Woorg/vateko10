#!/bin/bash
# docker-entrypoint.sh

set -e

# Изменяем владельца папки /var/www/html
chown -R www-data:www-data . /var/www/html

# Запуск PHP-FPM
exec "$@"



