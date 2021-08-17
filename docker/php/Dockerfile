FROM php:8.0.7-fpm

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash \
    && apt-get update && apt-get upgrade --yes \
    && apt-get install --yes git libicu-dev zlib1g-dev libzip-dev nodejs

RUN docker-php-ext-install pdo pdo_mysql intl \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN usermod -u 1000 www-data

COPY --chown=www-data:www-data ./composer.json ./composer.lock /var/www/

WORKDIR /var/www

RUN rm -rf /var/www/html && ln -s public html

USER www-data

EXPOSE 9000
