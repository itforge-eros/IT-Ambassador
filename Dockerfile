FROM php:fpm-alpine

WORKDIR /var/www/html

RUN apk --update add wget \
  curl \
  git \
  grep \
  nginx \
  build-base \
  libmemcached-dev \
  libmcrypt-dev \
  libxml2-dev \
  zlib-dev \
  autoconf \
  cyrus-sasl-dev \
  libgsasl-dev \
  supervisor

RUN docker-php-ext-install mysqli mbstring pdo pdo_mysql tokenizer xml
RUN pecl channel-update pecl.php.net && pecl install memcached && docker-php-ext-enable memcached

RUN rm /var/cache/apk/* && \
    mkdir -p /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . .

RUN chmod 755 $(find /var/www/html -type d) && chmod 644 $(find /var/www/html -type f) && chmod -R 777 storage && chmod -R 777 bootstrap/cache

RUN composer install

COPY nginx.conf /etc/nginx/nginx.conf
COPY supervisord.conf /etc/supervisord.conf

EXPOSE 80

ENTRYPOINT ["/usr/bin/supervisord", "-n", "-c",  "/etc/supervisord.conf"]