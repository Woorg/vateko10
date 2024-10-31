# Укажите базовый образ WordPress
FROM wordpress:php8.3-fpm

# Установка Composer
RUN apt-get update && \
  apt-get install -y curl unzip && \
  curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer

# Install non-dev dependencies
RUN set -eux; \
  apt-get update; \
  apt-get install -y --no-install-recommends \
  git vim zip unzip bash curl tzdata libicu-dev \
  libc-client-dev libgmp-dev gettext libssh2-1-dev libyaml-dev \
  libxslt1-dev libpng-dev libwebp-dev \
  libfreetype6-dev \
  libpq-dev libvips-dev \
  libzip-dev freetds-dev \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/*

# Install dependencies
RUN set -eux; \
  apt-get update; \
  apt-get install -y --no-install-recommends \
  libpng-dev libwebp-dev  freetype-dev \
  libc-client-dev liboniguruma-dev libxslt1-dev \
  libpq-dev libvips-dev libssh2-1-dev \
  libgmp-dev libzip-dev libxml2-dev \
  freetds-dev libyaml-dev \
  && docker-php-ext-install \
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
  \
  # Install xdebug
  && pecl install -o -f xdebug \
  && docker-php-ext-enable xdebug \
  \
  # Install YAML
  && pecl install -o -f yaml \
  && docker-php-ext-enable yaml \
  \
  # Install Redis
  && pecl install -o -f redis \
  && docker-php-ext-enable redis \
  \
  # Install MongoDB
  && pecl install -o -f mongodb \
  && docker-php-ext-enable mongodb \
  \
  # Install APCu
  && pecl install -o -f apcu \
  && docker-php-ext-enable apcu \
  \
  # Install SSH2
  && pecl install -o -f ssh2 \
  && docker-php-ext-enable ssh2 \
  \
  # Clean up
  && rm -rf /tmp/pear \
  && docker-php-source delete

# Clean up apt cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

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
