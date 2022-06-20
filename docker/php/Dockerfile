FROM php:8.1-apache

# Apacheの a2enmod rewriteを有効
RUN a2enmod rewrite

# apt-get update && install
RUN apt-get update && apt-get install -y \
    automake \
    autoconf \
    pngquant \
    libpng-dev \
    libxrender1 \
    libfontconfig \
    libxext6 \
    fonts-ipafont \
    curl \
    git \
    vim \
    zip \
    unzip


# pdo install
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql gd zip


# composer
COPY --from=composer:2.1 /usr/bin/composer /usr/bin/composer
RUN composer -v


EXPOSE 80