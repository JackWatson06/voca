FROM php:8.0-fpm-alpine

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pgsql pdo_pgsql

RUN chown -R www-data:www-data ./
