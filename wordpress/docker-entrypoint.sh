#!/bin/bash
# docker-entrypoint.sh

# Получаем UID и GID текущего пользователя
uid="$(id -u)"
gid="$(id -g)"

# Определяем пользователя и группу
if [ "$uid" = '0' ]; then
    user='www-data'
    group='www-data'
else
    user="$uid"
    group="$gid"
fi

# Проверяем, установлен ли WordPress
if [ ! -e index.php ] && [ ! -e wp-includes/version.php ]; then
    # Если WordPress не установлен и права на папку root:root, меняем владельца
    if [ "$uid" = '0' ] && [ "$(stat -c '%u:%g' .)" = '0:0' ]; then
        chown "$user:$group" .
    fi

    echo >&2 "WordPress not found in $PWD - copying now..."

    # Копируем WordPress
    tar --create --file - --directory /usr/src/wordpress --owner "$user" --group "$group" | tar --extract --file -
    echo >&2 "Complete! WordPress has been successfully copied to $PWD"
fi

# Меняем права доступа для директорий и файлов
find /var/www/html -type d -exec chmod 755 {} +
find /var/www/html -type f -exec chmod 644 {} +

# Запускаем php-fpm
exec php-fpm


# set -e

# # Изменяем владельца папки /var/www/html
# chown -R www-data:www-data . /var/www/html

# # Запуск PHP-FPM
# exec "$@"



