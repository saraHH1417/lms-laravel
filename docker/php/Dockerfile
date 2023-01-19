#FROM composer:2 as composer_stage
#
#RUN mkdir -p /usr/src/app/
#WORKDIR /usr/src/app
#
#COPY composer.json composer.lock ./
#
## This are production settings, I'm running with 'no-dev', adjust accordingly
## if you need it
#RUN composer install --ignore-platform-reqs --prefer-dist --no-scripts --no-progress --no-interaction --no-dev --no-autoloader
#
#RUN composer dump-autoload --optimize --apcu --no-dev


FROM php:8.1-fpm


# Install mysql client for DB imports via sql file
#  RUN apt-get update \
#     && apt-get install -y --no-install-recommends mysql-client;

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mysqli


# Set the working directory of the container to the hosted directory
WORKDIR /usr/src/app

COPY ./docker/php/entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh","php-fpm","-F"]










# Install dockerize so we can wait for containers to be ready
# ENV DOCKERIZE_VERSION 0.6.1

# RUN curl -s -f -L -o /tmp/dockerize.tar.gz https://github.com/jwilder/dockerize/releases/download/v$DOCKERIZE_VERSION/dockerize-linux-amd64-v$DOCKERIZE_VERSION.tar.gz \
#     && tar -C /usr/local/bin -xzvf /tmp/dockerize.tar.gz \
#     && rm /tmp/dockerize.tar.gz

# # Install Composer
# ENV COMPOSER_VERSION 2.1.5

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=$COMPOSER_VERSION

# # Install nodejs
# # RUN curl -sL https://deb.nodesource.com/setup_14.x | bash

# RUN apt-get update \
#     && apt-get install -y --no-install-recommends \
#         zlib \
#         # libz-dev \
#         # libpq-dev \
#         # libjpeg-dev \
#         # libpng-dev \
#         # libssl-dev \
#         # libzip-dev \
#         # unzip \
#         # zip \
#         # nodejs \
#     # && apt-get clean \
#     && pecl install redis \
#     && docker-php-ext-configure gd \
#     && docker-php-ext-configure zip \
#     && docker-php-ext-install \
#         gd \
#         exif \
#         opcache \
#         pdo_mysql \
#         pdo_pgsql \
#         pgsql \
#         pcntl \
#         zip \
#     && docker-php-ext-enable redis \
#     && rm -rf /var/lib/apt/lists/*;

# COPY ./docker/php/laravel.ini /usr/local/etc/php/conf.d/laravel.ini

# WORKDIR /usr/src/app

# RUN chown -R www-data:www-data .