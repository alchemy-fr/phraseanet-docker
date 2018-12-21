ARG VERSION
FROM php:$VERSION

MAINTAINER Ideepix <contact@ideepix.fr>


COPY php.ini /usr/local/etc/php/

RUN apt-get update \
&& apt-get install apt-transport-https ca-certificates

RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
&& curl -sL https://deb.nodesource.com/setup_11.x | bash - \
&& echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list


RUN apt-get update \
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
    unzip \
    mcrypt \
    swftools \
    xpdf \
    unoconv \
    ghostscript \
    gpac \
    libav-tools \
    locales \
    libicu-dev \
    git \	
    nodejs \
    yarn

RUN update-locale "LANG=fr_FR.UTF-8 UTF-8" \
&& dpkg-reconfigure --frontend noninteractive locales


RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-install zip exif iconv mbstring pcntl sockets xsl intl pdo_mysql gettext bcmath mcrypt 


# pecl
RUN pecl install redis amqp zmq-beta imagick-beta xdebug \
&& docker-php-ext-enable redis amqp zmq imagick \
&& pecl clear-cache \
&& docker-php-source delete \
&& echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
&& echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
&& echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN npm install -g npm bower webpack webpack-cli  -g 

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl -sS https://getcomposer.org/installer | \
php -- --install-dir=/usr/bin/ --filename=composer


COPY php-fpm.conf usr/local/etc/php-fpm.d/zz-docker.conf
COPY www.conf /usr/local/etc/php-fpm.d/www.conf.default
        
        
COPY configuration-compiled.php /var/configuration-compiled.php
COPY configuration.yml /var/configuration.yml
COPY proxies /var/proxies

RUN apt-get install nano
RUN apt-get install git
RUN apt-get install supervisor

RUN apt-get autoremove -y \
&& apt-get clean all \
&& rm -rvf /var/lib/apt/lists/* \
&& rm -rvf /usr/share/doc /usr/share/man /usr/share/locale	\
&& rm -rf /tmp/*


# Permission fix
RUN usermod -u 33 www-data 
RUN usermod -G staff www-data

ADD docker-entrypoint.sh /
RUN chmod +x /docker-entrypoint.sh
ENTRYPOINT ["/docker-entrypoint.sh"]
CMD ["php-fpm"]





