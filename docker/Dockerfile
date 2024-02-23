FROM php:8.3.3-fpm-bullseye

## Diretório da aplicação
ARG APP_DIR=/var/www/app

### apt-utils é um extensão de recursos do gerenciador de pacotes APT
RUN apt-get update -y && apt-get install -y --no-install-recommends \
    apt-utils \ 
    supervisor

# dependências recomendadas de desenvolvido para ambiente linux
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip \
    libpng-dev \
    libpq-dev \
    libxml2-dev

RUN docker-php-ext-install mysqli pdo pdo_mysql pdo_pgsql pgsql session xml

RUN docker-php-ext-install zip iconv simplexml pcntl gd fileinfo

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY ./supervisord/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
### Supervisor permite monitorar e controlar vários processos (LINUX)
### Bastante utilizado para manter processos em Daemon, ou seja, executando em segundo plano

COPY ./php/extra-php.ini "$PHP_INI_DIR/99_extra.ini"
COPY ./php/extra-php-fpm.conf /etc/php8/php-fpm.d/www.conf

WORKDIR $APP_DIR
RUN cd $APP_DIR
RUN chown www-data:www-data $APP_DIR

COPY --chown=www-data:www-data ../app/ .
RUN rm -rf vendor
RUN composer install --no-interaction

RUN apt-get install nginx -y
RUN rm -rf /etc/nginx/sites-enabled/* && rm -rf /etc/nginx/sites-available/*
COPY ./nginx/sites.conf /etc/nginx/sites-enabled/default.conf
COPY ./nginx/error.html /var/www/html/error.html

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN cd /var/www && \
chown -R www-data:www-data * && \
chmod -R o+w app

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/supervisord.conf"]