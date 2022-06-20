FROM php:8.1-apache

# Apacheの a2enmod rewriteを有効
RUN a2enmod rewrite

# apt-get update && install
RUN apt-get update && apt-get install -y \
    automake autoconf pngquant libpng-dev libxrender1 libfontconfig libxext6 fonts-ipafont \
    zip unzip \
    vim git curl


# pdo install
RUN apt-get install -y libpq-dev \
  && docker-php-ext-install pdo pdo_mysql pdo_pgsql gd


RUN usermod -u 1000 www-data -s /bin/bash && groupmod -g 1000 www-data

# composer
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer


COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

WORKDIR /var/www/html

EXPOSE 80