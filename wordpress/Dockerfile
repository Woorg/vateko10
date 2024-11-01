# FROM wordpress:php8.3-fpm

# COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

# RUN apt-get -y update && apt-get install -y lsb-release curl gpg systemctl && curl -fsSL https://packages.redis.io/gpg | gpg --dearmor -o /usr/share/keyrings/redis-archive-keyring.gpg && chmod 644 /usr/share/keyrings/redis-archive-keyring.gpg && echo "deb [signed-by=/usr/share/keyrings/redis-archive-keyring.gpg] https://packages.redis.io/deb $(lsb_release -cs) main" | tee /etc/apt/sources.list.d/redis.list && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
# RUN apt-get install -y redis redis-tools && pecl install redis && docker-php-ext-enable redis

# COPY ./redis.conf /usr/local/etc/redis/redis.conf


# RUN if [ -f "/var/www/html/composer.json" ]; then composer install ; fi

# RUN if [ -f "/var/www/html/wp-content/themes/vateko10/composer.json" ]; then composer install ; fi

# RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
#   && chmod +x wp-cli.phar \
#   && mv wp-cli.phar /usr/local/bin/wp


# RUN systemctl enable redis-server && redis-server /usr/local/etc/redis/redis.conf --save 60 1 --loglevel warning --maxmemory 128mb --maxmemory-policy allkeys-lru && ps aux | grep redis-server


# COPY docker-entrypoint.sh /docker-entrypoint.sh

# ENTRYPOINT ["/docker-entrypoint.sh"]

# CMD ["php-fpm"]


# Используем образ PHP с поддержкой FPM
FROM php:8.3-fpm

# Устанавливаем необходимые расширения PHP
RUN apt-get update && apt-get install -y \
  libzip-dev \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  unzip \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install zip mysqli gd

# Устанавливаем Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Устанавливаем WP-CLI для управления WordPress через командную строку
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/local/bin/wp

# Копируем php.ini в контейнер
COPY php.ini /usr/local/etc/php/conf.d/php.ini

# Копируем файлы WordPress в контейнер
COPY . /var/www/html
WORKDIR /var/www/html

# Устанавливаем права на папку
RUN chown -R www-data:www-data /var/www/html 
RUN chmod -R 755 /var/www/html

USER www-data

# RUN chmod a+rwx -R /var/www/html

# Устанавливаем рабочую директорию

# Запускаем PHP-FPM
CMD ["php-fpm"]
