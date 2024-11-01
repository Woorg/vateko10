# #!/bin/bash
# # docker-entrypoint.sh

# set -e

# # Изменяем владельца папки /var/www/html
# chown -R www-data:www-data . /var/www/html

# # Изменяем права на файлы 
# chmod -R 755 /var/www/html

# # Запускаем php-fpm
# exec php-fpm


# # Запуск PHP-FPM



#!/bin/bash
# docker-entrypoint.sh

set -e

# Изменяем владельца папки /var/www/html
chown -R www-data:www-data /var/www/html

# Устанавливаем права доступа: 755 для папок и 644 для файлов
find /var/www/html -type d -exec chmod 755 {} \;
find /var/www/html -type f -exec chmod 644 {} \;

# Запускаем php-fpm
# exec php-fpm
exec "$@"
