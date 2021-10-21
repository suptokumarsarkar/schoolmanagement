FROM debian:stretch

ARG USER_ID
ARG XDEBUG_REMOTE_HOST
ADD sources.list /etc/apt/

RUN apt-get update \
    && apt-get install -y apt-transport-https lsb-release ca-certificates wget \
    && wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list \
    && apt-get update \
    && apt-get install -y  --force-yes \
    php7.4-cli \
    php7.4-amqp \
    php7.4-bcmath \
    php7.4-ctype \
    php7.4-curl \
    php7.4-dom \
    php7.4-fileinfo \
    php7.4-iconv \
    php7.4-fpm \
    php7.4-intl \
    php7.4-zip \
    php7.4-json \
    php7.4-mbstring \
    php7.4-opcache \
    php7.4-pdo \
    php7.4-mysql \
    php7.4-redis \
    php7.4-simplexml \
    php7.4-sockets \
    php7.4-tokenizer \
    php7.4-xml \
    php7.4-xmlwriter \
    php7.4-dev \
    php7.4-mongodb \
    php7.4-gd \
    tzdata \
    curl \
    php-pear \
    php7.4-xdebug \
    nano \
    nmap

RUN pecl install mongodb-1.9.1

COPY xdebug.ini /etc/php/7.4/mods-available/xdebug.ini
RUN echo "\nxdebug.client_host=$XDEBUG_REMOTE_HOST" >> /etc/php/7.4/mods-available/xdebug.ini

COPY www.pool.conf /etc/php/7.4/fpm/pool.d/www.conf

RUN usermod -u $USER_ID www-data \
    && mkdir -p /run/php/ \
    && chown www-data:www-data /var/run

ADD php.ini /etc/php/7.4/fpm/conf.d/

CMD ["/usr/sbin/php-fpm7.4", "--nodaemonize"]

EXPOSE 9000
