FROM wordpress:php8.1-fpm

COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

# install redis
RUN apt-get -y update && apt-get install -y lsb-release curl gpg systemctl && curl -fsSL https://packages.redis.io/gpg | gpg --dearmor -o /usr/share/keyrings/redis-archive-keyring.gpg && chmod 644 /usr/share/keyrings/redis-archive-keyring.gpg && echo "deb [signed-by=/usr/share/keyrings/redis-archive-keyring.gpg] https://packages.redis.io/deb $(lsb_release -cs) main" | tee /etc/apt/sources.list.d/redis.list 
RUN apt-get install -y redis redis-tools && pecl install redis && docker-php-ext-enable redis

COPY ./redis.conf /usr/local/etc/redis/redis.conf

RUN systemctl enable redis-server && redis-server /usr/local/etc/redis/redis.conf --save 60 1 --loglevel warning --maxmemory 128mb --maxmemory-policy allkeys-lru && ps aux | grep redis-server