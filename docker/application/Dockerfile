FROM debian:bullseye

ARG APP_ENV=dev
ENV APP_ENV=dev

ENV ACCEPT_EULA=Y

# Install prerequisites required for tools and extensions installed later on.
RUN apt-get update \
    && apt-get install -y apt-transport-https gnupg2 libpng-dev libzip-dev unzip curl gnupg nano wget vim \
    && rm -rf /var/lib/apt/lists/*

# Installation apache2
RUN apt-get update
RUN apt-get install -y apache2 apache2-utils

# Installation PHP 7.4
RUN apt-get install -y lsb-release apt-transport-https ca-certificates
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg
RUN echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list
RUN apt-get update
RUN apt-get install -y php8.2

# Install needed PHP extensions
RUN apt-get update
RUN apt-get install -y php8.2-apcu php8.2-curl php8.2-pgsql php8.2-dev php8.2-gd php8.2-intl php8.2-mbstring php8.2-odbc php-pear php8.2-xdebug php8.2-xml php8.2-zip

# Pulling latest composer docker image
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configure HTTPd
COPY docker/application/entrypoint.sh /root/
RUN a2enmod rewrite
RUN rm -Rf /etc/apache2/sites-enabled/*
COPY docker/application/repository-vhost.conf /etc/apache2/sites-available/repository-vhost.conf
RUN ln -s /etc/apache2/sites-available/repository-vhost.conf /etc/apache2/sites-enabled/repository-vhost.conf

# Configure project directory
COPY bin /var/www/bin
COPY .env /var/www/
COPY composer.json /var/www/composer.json
COPY composer.lock /var/www/composer.lock
COPY config /var/www/config
COPY migrations /var/www/migrations
COPY public /var/www/public
COPY symfony.lock /var/www/symfony.lock
COPY src /var/www/src
COPY templates /var/www/templates

# Section for tests
# COPY tests /var/www/tests
# COPY phpunit.xml.dist /var/www/phpunit.xml.dist
# COPY .env.test /var/www/.env.test

RUN mkdir /var/www/var
RUN mkdir /var/www/vendor
RUN chown -R www-data:www-data /var/www
RUN sed -i -e 's|www-data:x:33:33:www-data:/var/www:/usr/sbin/nologin|www-data:x:33:33:www-data:/var/www:/bin/sh|g' /etc/passwd

# Setting the work directory.
WORKDIR /var/www

# Installing composer dependencies
RUN composer install

RUN sed -i -e 's|www-data:x:33:33:www-data:/var/www:/bin/sh|www-data:x:33:33:www-data:/var/www:/usr/sbin/nologin|g' /etc/passwd
RUN rm -R /var/www/html

ENTRYPOINT ["/bin/bash", "/root/entrypoint.sh"]

EXPOSE 80
