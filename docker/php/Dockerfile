FROM php:7.4.26-fpm

# Instalação do Composer
RUN apt-get update && apt-get install -y --no-install-recommends \
    wget \
    unzip \
    && rm -rf /var/lib/apt/lists/*

#Instalaçao XDEBUG
RUN wget -O xdebug.tgz https://pecl.php.net/get/xdebug-2.9.8.tgz
RUN pecl install xdebug.tgz && docker-php-ext-enable xdebug


RUN wget https://getcomposer.org/installer -O composer-setup.php \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php

# # Dependências PHP
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libxml2-dev libxslt1-dev python-dev-is-python3 \
        curl unzip zip libzip-dev \
        libmcrypt-dev libreadline-dev

# # Instalação das extensões do PHP
RUN docker-php-ext-install -j$(nproc) \
    pdo_mysql \
    bcmath  \
    ctype \
    fileinfo \
    xml
    

#Configuração xdebug
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start-with-request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.discover_client_host=0" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.max_nesting_level=9999" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

#Fim Config XDEBUG
