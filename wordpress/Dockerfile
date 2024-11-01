FROM wordpress:php8.3-fpm

COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

# install redis
RUN apt-get -y update && apt-get install -y lsb-release curl gpg systemctl && curl -fsSL https://packages.redis.io/gpg | gpg --dearmor -o /usr/share/keyrings/redis-archive-keyring.gpg && chmod 644 /usr/share/keyrings/redis-archive-keyring.gpg && echo "deb [signed-by=/usr/share/keyrings/redis-archive-keyring.gpg] https://packages.redis.io/deb $(lsb_release -cs) main" | tee /etc/apt/sources.list.d/redis.list && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer 
RUN apt-get install -y redis redis-tools && pecl install redis && docker-php-ext-enable redis

COPY ./redis.conf /usr/local/etc/redis/redis.conf

# COPY . /var/www/html

# Копирование wp-config.php
# COPY wp-config.php /var/www/html/wp-config-blya.php
# COPY some.txt /var/www/html/some-some.txt

# Установите права доступа
# RUN chown -R www-data:www-data /var/www/html \
#   && chmod -R 755 /var/www/html


RUN set -eux; \
  version='6.6.2'; \
  sha1='7acbf69d5fdaf804e3db322bad23b08d2e2e42ec'; \
  \
  curl -o wordpress.tar.gz -fL "https://wordpress.org/wordpress-$version.tar.gz"; \
  echo "$sha1 *wordpress.tar.gz" | sha1sum -c -; \
  \
  # upstream tarballs include ./wordpress/ so this gives us /usr/src/wordpress
  tar -xzf wordpress.tar.gz -C /usr/src/; \
  rm wordpress.tar.gz; \
  \
  # https://wordpress.org/support/article/htaccess/
  [ ! -e /usr/src/wordpress/.htaccess ]; \
  { \
  echo '# BEGIN WordPress'; \
  echo ''; \
  echo 'RewriteEngine On'; \
  echo 'RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]'; \
  echo 'RewriteBase /'; \
  echo 'RewriteRule ^index\.php$ - [L]'; \
  echo 'RewriteCond %{REQUEST_FILENAME} !-f'; \
  echo 'RewriteCond %{REQUEST_FILENAME} !-d'; \
  echo 'RewriteRule . /index.php [L]'; \
  echo ''; \
  echo '# END WordPress'; \
  } > /usr/src/wordpress/.htaccess; \
  \
  chown -R www-data:www-data /usr/src/wordpress; \
  # pre-create wp-content (and single-level children) for folks who want to bind-mount themes, etc so permissions are pre-created properly instead of root:root
  # wp-content/cache: https://github.com/docker-library/wordpress/issues/534#issuecomment-705733507
  mkdir wp-content; \
  for dir in /usr/src/wordpress/wp-content/*/ cache; do \
  dir="$(basename "${dir%/}")"; \
  mkdir "wp-content/$dir"; \
  done; \
  chown -R www-data:www-data wp-content; \
  chmod -R 1777 wp-content


# Установка зависимостей через Composer, если есть composer.json
RUN if [ -f "/var/www/html/composer.json" ]; then composer install ; fi

RUN if [ -f "/var/www/html/wp-content/themes/vateko10/composer.json" ]; then composer install ; fi

# Установите WP CLI для управления WordPress через командную строку
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
  && chmod +x wp-cli.phar \
  && mv wp-cli.phar /usr/local/bin/wp


RUN systemctl enable redis-server && redis-server /usr/local/etc/redis/redis.conf --save 60 1 --loglevel warning --maxmemory 128mb --maxmemory-policy allkeys-lru && ps aux | grep redis-server