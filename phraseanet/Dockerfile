FROM php:7.3-fpm-stretch

COPY php.ini /usr/local/etc/php/

RUN apt-get update \
    && apt-get install -y apt-transport-https ca-certificates gnupg2 \
    && apt-get update \
    && apt-get install -y --no-install-recommends zlib1g-dev \
        libssl-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libxslt-dev	\
        librabbitmq-dev \
        libzmq3-dev \
        imagemagick \
        libmagickwand-dev \
        swftools \
        xpdf \
        unoconv \
        ghostscript \
        gpac \
        libav-tools \
        locales \
        libicu-dev \
        unzip \
        git \
        libzip-dev \
        nodejs \
        yarn \
        libpng-dev \
        build-essential \
        libsodium-dev \
    && update-locale "LANG=fr_FR.UTF-8 UTF-8" \
    && dpkg-reconfigure --frontend noninteractive locales \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip exif iconv mbstring pcntl sockets xsl intl pdo_mysql gettext bcmath \
    && pecl install redis amqp imagick-beta xdebug \
    && docker-php-ext-enable redis amqp imagick \
    && pecl clear-cache \
    && docker-php-source delete \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini \
	&& rm -rf /var/lib/apt/lists/*

ENV ZEROMQ_VERSION=4.1.4
ENV ZEROMQ_PHP_VERSION=1.1.2

RUN cd /tmp \
    && curl -fsSL https://archive.org/download/zeromq_${ZEROMQ_VERSION}/zeromq-${ZEROMQ_VERSION}.tar.gz -o zeromq.tar.gz \
    && mkdir -p /tmp/zeromq \
    && tar -xf zeromq.tar.gz -C /tmp/zeromq --strip-components=1 \
    && rm zeromq.tar.gz \
    && cd /tmp/zeromq \
    && ./configure \
    && make \
    && make install \
    && curl -fsSL https://github.com/mkoppanen/php-zmq/archive/master.tar.gz -o php-zmq.tar.gz \
    && mkdir -p /tmp/php-zmq \
    && tar -xf php-zmq.tar.gz -C /tmp/php-zmq --strip-components=1 \
    && cd /tmp/php-zmq \
    && docker-php-ext-configure /tmp/php-zmq \
    && docker-php-ext-install /tmp/php-zmq \
    && rm -rf /tmp/php-zmq \
    && useradd -u 1000 app \
    && cd /root \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && mkdir -p /home/app/.composer \
    && chown -R app: /home/app

COPY php-fpm.conf /usr/local/etc/php-fpm.d/zz-docker.conf
COPY www.conf /usr/local/etc/php-fpm.d/www.conf.default

WORKDIR /var/Phraseanet/

CMD ["php-fpm"]
