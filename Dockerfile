# Укажите базовый образ WordPress
FROM wordpress:php8.3-fpm

# Установка Composer
RUN apt-get update && \
  apt-get install -y --no-install-recommends \
  curl unzip git vim zip bash tzdata libicu-dev \
  libfreetype6-dev libc-client-dev gettext \
  libpng-dev libwebp-dev libxslt1-dev libpq-dev \
  libvips-dev libssh2-1-dev libgmp-dev libzip-dev \
  libxml2-dev freetds-dev libyaml-dev libonig-dev \
  && curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/*

# Установка PHP-расширений
RUN set -eux; \
  docker-php-ext-install \
  mysqli \
  pdo_mysql \
  pdo_pgsql \
  pgsql \
  bcmath \
  mbstring \
  xml \
  gd \
  exif \
  zip \
  soap \
  intl \
  xsl \
  pcntl \
  sockets \
  sysvmsg \
  sysvsem \
  sysvshm \
  opcache \
  imap \
  gmp \
  && pecl install -o -f redis \
  && docker-php-ext-enable redis \
  && rm -rf /tmp/pear \
  && docker-php-source delete

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
