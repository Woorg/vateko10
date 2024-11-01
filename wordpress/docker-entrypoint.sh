#!/bin/bash
# docker-entrypoint.sh
set -e

# Изменение прав доступа перед запуском php-fpm
# COPY --chown=www-data:www-data wp-config.php /usr/src/wordpress/ # buildkit


# Копируем и устанавливаем права на файлы WordPress
# COPY . /var/www/html
# RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html


# Копируем файлы в /var/www/html, если они еще не скопированы
if [ ! -d "/var/www/html/wp-content" ]; then
    cp -r ./wordpress/* /var/www/html
fi

# Настройка прав на директорию
chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html


chown -R www-data:www-data /var/www/html
chmod -R 755 /var/www/html



# Запуск PHP-FPM
exec "$@"
