FROM php:7.1-fpm
RUN echo 'deb http://httpredir.debian.org/debian jessie contrib' >> /etc/apt/sources.list
RUN apt-get update
RUN export DEBIAN_FRONTEND=noninteractive && apt-get install -y --force-yes libssl-dev curl  libcurl4-gnutls-dev libxml2-dev libicu-dev libmcrypt4 libmemcached11 openssl
#composer
RUN apt-get install -y --force-yes curl && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# configurações do OpCache
RUN docker-php-ext-install opcache
# configurações do APCU
RUN pecl install apcu-5.1.5 && docker-php-ext-enable apcu
# libs extras
RUN docker-php-ext-install bcmath
RUN apt-get install -y libbz2-dev
RUN docker-php-ext-install bz2
RUN docker-php-ext-install mbstring
RUN apt-get install -y libpq-dev
RUN apt-get install -y libicu-dev
RUN docker-php-ext-install intl
# lib GD
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng16-16
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/
RUN docker-php-ext-install gd
# pdo
RUN docker-php-ext-install pdo mbstring pdo_mysql
# mysqli
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
# git
RUN apt-get install -y --force-yes git-all
# zip
chmod 777 -R /code
RUN apt-get install -y \
        libzip-dev \
        zip \
  && docker-php-ext-configure zip --with-libzip \
  && docker-php-ext-install zip
EXPOSE 9000
CMD ["php-fpm"]
