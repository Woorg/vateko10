FROM wordpress:php8.3-fpm

COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

# install redis
RUN apt-get -y update && apt-get install -y lsb-release curl gpg systemctl && curl -fsSL https://packages.redis.io/gpg | gpg --dearmor -o /usr/share/keyrings/redis-archive-keyring.gpg && chmod 644 /usr/share/keyrings/redis-archive-keyring.gpg && echo "deb [signed-by=/usr/share/keyrings/redis-archive-keyring.gpg] https://packages.redis.io/deb $(lsb_release -cs) main" | tee /etc/apt/sources.list.d/redis.list && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
RUN apt-get install -y redis redis-tools && pecl install redis && docker-php-ext-enable redis

COPY ./redis.conf /usr/local/etc/redis/redis.conf

# Копируем файлы WordPress
# COPY --chown=www-data:www-data . /var/www/html


# RUN ls -la ../ 
# 
# RUN ls -la .

# Копируем файлы WordPress и устанавливаем права
COPY --chown=www-data:www-data . /var/www/html
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# COPY --chown=www-data:www-data . /var/www/html


# Выводим содержимое /var/www/html в лог
RUN ls -la /var/www/html

# Установка прав доступа на файлы WordPress
# RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html

# Установка зависимостей через Composer, если есть composer.json
RUN if [ -f "/var/www/html/composer.json" ]; then composer install ; fi

RUN if [ -f "/var/www/html/wp-content/themes/vateko10/composer.json" ]; then composer install ; fi

# Установите WP CLI для управления WordPress через командную строку
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/local/bin/wp


RUN systemctl enable redis-server && redis-server /usr/local/etc/redis/redis.conf --save 60 1 --loglevel warning --maxmemory 128mb --maxmemory-policy allkeys-lru && ps aux | grep redis-server


# Добавьте файл entrypoint.sh в контейнер
# COPY docker-entrypoint.sh /docker-entrypoint.sh

# Установите entrypoint
# ENTRYPOINT ["/docker-entrypoint.sh"]

# Команда запуска php-fpm
CMD ["php-fpm"]
