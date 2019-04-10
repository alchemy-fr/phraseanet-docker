FROM phraseanet

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN apt-get update && apt-get install -y \
        autoconf \
        curl \
        git \
        iputils-ping \
        libtool \
        nano \
        nasm \
        pkg-config \
        telnet \
        unzip \
        vim \
        zsh \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony \
    && chmod a+x /usr/local/bin/symfony \
    && echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> /etc/zsh/zshrc \
    && curl -sL https://deb.nodesource.com/setup_10.x | bash - \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y \
        nodejs \
        yarn \
        libpng-dev \
        build-essential \
    && rm -rf /var/lib/apt/lists/* \
    && mkdir -p /bootstrap/entrypoint.d \
    && git clone https://github.com/robbyrussell/oh-my-zsh.git /bootstrap/.oh-my-zsh \
    && npm install -g \
        bower

COPY oh-my-zsh/.zshrc /bootstrap/.zshrc
COPY entrypoint.sh /bootstrap/entrypoint.sh
COPY entrypoint.d/* /bootstrap/entrypoint.d/
COPY install.sh /install.sh
COPY oh-my-zsh/plugins /bootstrap/.oh-my-zsh/plugins
COPY oh-my-zsh/themes /bootstrap/.oh-my-zsh/themes

RUN chmod -R +x \
        /bootstrap/entrypoint.sh \
        /bootstrap/entrypoint.d/*.sh \
        /install.sh

USER app

ENTRYPOINT ["/bootstrap/entrypoint.sh"]

CMD ["/bin/zsh"]
