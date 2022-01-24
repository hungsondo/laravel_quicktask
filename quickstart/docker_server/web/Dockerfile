ARG PHP_VERSION

FROM php:${PHP_VERSION}-fpm

MAINTAINER Pham Huu Canh "canh.phamhuu@morsoftware.com"

RUN apt-get update && apt-get install -y \
      vim \
      libicu-dev \
      libpq-dev \
      libmcrypt-dev \
      zlib1g-dev \
      libzip-dev \
      libonig-dev \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libpng-dev \
      wkhtmltopdf \
    && rm -r /var/lib/apt/lists/* \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && pecl install mcrypt \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install \
      intl \
      pcntl \
      pdo_mysql \
      pdo_pgsql \
      pgsql \
      zip \
      mbstring \
      opcache \
#    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install \
       gd
RUN apt-get update && apt-get install -y \
    libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick

RUN echo "=====INSTALL COMPOSER====="
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN echo "=====INSTALL COMPOSER COMPLETED====="

CMD ["/var/www/docker_server/web/run.sh"]
