FROM php:8.2-apache

ARG DEBIAN_FRONTEND=noninteractive

RUN docker-php-ext-install mysqli pdo_mysql

RUN apt install g++ make

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN apt update \
    && apt install libzip-dev zlib1g-dev -y \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip

RUN a2enmod rewrite 

RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker && \
    echo "xdebug.remote_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \ 
    echo 'xdebug.remote_port=80' >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
    