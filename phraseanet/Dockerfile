FROM php:7.1-fpm-stretch as phraseanet_prod

RUN apt-get update \
    && apt-get install -y \
        apt-transport-https \
        ca-certificates \
        gnupg2 \
    && apt-get update \
    && apt-get install -y --no-install-recommends zlib1g-dev \
        ghostscript \
        gpac \
        imagemagick \
        libav-tools \
        libfreetype6-dev \
        libicu-dev \
        libjpeg62-turbo-dev \
        libmagickwand-dev \
        libmcrypt-dev \
        libpng-dev \
        librabbitmq-dev \
        libssl-dev \
        libxslt-dev \
        libzmq3-dev \
        locales \
        mcrypt \
        swftools \
        unoconv \
        unzip \
        xpdf \
    && update-locale "LANG=fr_FR.UTF-8 UTF-8" \
    && dpkg-reconfigure --frontend noninteractive locales \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip exif iconv mbstring pcntl sockets xsl intl pdo_mysql gettext bcmath mcrypt \
    && pecl install redis amqp-1.9.3 zmq-beta imagick-beta \
    && docker-php-ext-enable redis amqp zmq imagick \
    && pecl clear-cache \
    && docker-php-source delete \
    && rm -rf /var/lib/apt/lists/*

RUN mkdir /entrypoint /var/alchemy \
    && useradd -u 1000 app \
    && mkdir -p /home/app/.composer \
    && chown -R app: /home/app /var/alchemy

COPY php.ini /usr/local/etc/php/
COPY php-fpm.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY www.conf /usr/local/etc/php-fpm.d/www.conf.default

WORKDIR /var/alchemy/

CMD ["php-fpm"]

FROM phraseanet_prod as phraseanet_debug

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        iproute2 \
    && rm -rf /var/lib/apt/lists/* \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && pecl clear-cache

COPY usr-bin/* /usr/local/bin/
COPY entrypoint.sh /

RUN chmod +x /entrypoint.sh /usr/local/bin/docker-*

ENTRYPOINT ["/entrypoint.sh"]

CMD ["php-fpm"]
