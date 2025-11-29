FROM php:8.4-apache

RUN apt update -y

RUN apt install unzip

RUN docker-php-ext-install mysqli pdo_mysql ftp

RUN apt install g++ make

RUN apt install libzip-dev zlib1g-dev libpng-dev libjpeg-dev -y \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-install zip \
    && docker-php-ext-configure gd --with-jpeg \
    && docker-php-ext-install gd

RUN a2enmod rewrite

RUN php -r "copy('https://getcomposer.org/installer','composer-setup.php');"

RUN php composer-setup.php --filename=composer --install-dir=/usr/local/bin
RUN php -r "unlink('composer-setup.php');"

RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN echo "xdebug.mode=debug,develop" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini && \
    echo "xdebug.discover_client_host=true" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

RUN curl -f -L  -o ./phpstorm_xdebug.zip "https://packages.jetbrains.team/files/p/ij/xdebug-validation-script/script/phpstorm_xdebug_validator.zip";unzip ./phpstorm_xdebug.zip -d .;rm -f ./phpstorm_xdebug.zip