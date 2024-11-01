#!/bin/bash
# entrypoint.sh

# Изменение прав доступа перед запуском php-fpm
chown -R www-data:www-data /var/www
chmod -R 755 /var/www

# Запуск PHP-FPM
exec "$@"
