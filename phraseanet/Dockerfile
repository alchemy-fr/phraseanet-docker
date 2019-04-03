FROM php:7.1-fpm-stretch

COPY php.ini /usr/local/etc/php/

RUN apt-get update \
    && apt-get install -y apt-transport-https ca-certificates gnupg2 \
    && apt-get update \
    && apt-get install -y --no-install-recommends zlib1g-dev \
        libssl-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libxslt-dev	\
        librabbitmq-dev \
        libzmq3-dev \
        imagemagick \
        libmagickwand-dev \
        mcrypt \
        swftools \
        xpdf \
        unoconv \
        ghostscript \
        gpac \
        libav-tools \
        locales \
        libicu-dev \
        unzip \
    && update-locale "LANG=fr_FR.UTF-8 UTF-8" \
    && dpkg-reconfigure --frontend noninteractive locales \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip exif iconv mbstring pcntl sockets xsl intl pdo_mysql gettext bcmath mcrypt \
    && pecl install redis amqp-1.9.3 zmq-beta imagick-beta xdebug \
    && docker-php-ext-enable redis amqp zmq imagick \
    && pecl clear-cache \
    && docker-php-source delete \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN mkdir /entrypoint \
    && useradd -u 1000 app \
    && mkdir -p /home/app/.composer \
    && chown -R app: /home/app

COPY php-fpm.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY www.conf /usr/local/etc/php-fpm.d/www.conf.default

WORKDIR /var/Phraseanet/

CMD ["php-fpm"]
