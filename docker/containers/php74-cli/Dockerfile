FROM debian:stretch

ARG USER_ID
ADD sources.list /etc/apt/

RUN apt-get update \
    && apt -y install lsb-release apt-transport-https ca-certificates wget \
    && wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg \
    && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php7.4.list \
    && apt-get update \
    && apt-get install -y  --force-yes \
    apache2 \
    libapache2-mod-php7.4 \
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
    git \
    openssh-client \
    unzip \
    php-pear \
    && a2enmod rewrite \
    && a2enmod headers \
    && a2enmod http2

RUN pecl install mongodb-1.9.1

ADD php-cli.ini /etc/php7.4/cli/conf.d/
ADD install-composer.sh /tmp/install-composer.sh
COPY scripts/composerInstall.sh /tmp/composerInstall.sh
RUN ["chmod", "+x", "/tmp/composerInstall.sh"]

RUN useradd -u $USER_ID --home /home/php-user php-user \
    && mkdir -p /home/php-user \
    && chown -R php-user.php-user /home/php-user
RUN /tmp/install-composer.sh
WORKDIR /var/www/html
USER php-user

CMD ["php", "-a"]
