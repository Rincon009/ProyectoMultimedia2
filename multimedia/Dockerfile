
FROM php:8.2-fpm


RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip wget && \
    docker-php-ext-install intl opcache pdo pdo_mysql && \
    pecl install apcu && docker-php-ext-enable apcu && \
    docker-php-ext-configure zip && docker-php-ext-install zip


WORKDIR /var/www/laravel

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV PATH="${PATH}:/var/www/laravel/vendor/bin"

RUN chown -R www-data:www-data /var/www/laravel

COPY ./multimedia/.env /var/www/laravel/.env

COPY ./multimedia/ .
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer install --optimize-autoloader --no-dev


RUN sed -i 's/listen = 127.0.0.1:9000/listen = 0.0.0.0:8000/' /usr/local/etc/php-fpm.d/www.conf

RUN wget https://github.com/jwilder/dockerize/releases/download/v0.6.1/dockerize-linux-amd64-v0.6.1.tar.gz && \
    tar -C /usr/local/bin -xzvf dockerize-linux-amd64-v0.6.1.tar.gz && \
    rm dockerize-linux-amd64-v0.6.1.tar.gz

EXPOSE 8000

CMD ["sh", "-c", "dockerize -wait tcp://mysql:3306 -timeout 60s && php-fpm -F"]