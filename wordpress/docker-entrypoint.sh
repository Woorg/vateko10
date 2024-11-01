#!/bin/bash
# docker-entrypoint.sh

# Изменение прав доступа перед запуском php-fpm
# COPY --chown=www-data:www-data wp-config.php /usr/src/wordpress/ # buildkit



chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html



# Запуск PHP-FPM
exec "$@"
