FROM redis:7.4-alpine

WORKDIR /redis

COPY ./redis.conf /usr/local/etc/redis/redis.conf

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh
ENTRYPOINT "/entrypoint.sh"