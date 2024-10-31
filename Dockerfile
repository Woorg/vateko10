# Укажите базовый образ WordPress
FROM wordpress:php8.3-fpm

# Установка Composer
RUN apt-get update && \
  apt-get install -y curl unzip && \
  curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer

# Установка расширения Redis
RUN apt-get update && apt-get install -y php8.3-ctype php8.3-iconv php8.3-redis php8.3-simplexml php8.3-sodium php8.3-tokenizer php8.3-xml php8.3-xmlwriter php8.3-zip php8.3-mbstring php8.3-json php8.3-curl php8.3-mysqli


# Скопируйте все файлы из репозитория в /var/www/html
COPY . /var/www/html

# Установите права доступа
RUN chown -R www-data:www-data /var/www/html \
  && chmod -R 755 /var/www/html

# Установка зависимостей через Composer, если есть composer.json
RUN if [ -f "/var/www/html/composer.json" ]; then composer install --ignore-platform-req=ext-redis; fi

# Установите WP CLI для управления WordPress через командную строку
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/local/bin/wp
