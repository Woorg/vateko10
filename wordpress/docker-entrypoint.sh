#!/bin/bash
# docker-entrypoint.sh

set -e

# Изменяем владельца папки /var/www/html
chown -R www-data:www-data . /var/www/html

# Для директорий
for dir in $(find /var/www/html -type d); do
  chmod 755 "$dir"
done

# Для файлов
for dir in $(find /var/www/html -type d); do
  chmod 755 "$dir"
done

# Изменяем права на файлы 
# find /var/www/html -type d -exec chmod 755 {} \;
# find /var/www/html -type f -exec chmod 644 {} \;


# Запуск PHP-FPM
exec "$@"



