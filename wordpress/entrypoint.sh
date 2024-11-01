#!/bin/bash
# entrypoint.sh

# Изменение прав доступа перед запуском php-fpm
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html

# Запуск PHP-FPM
exec "$@"
