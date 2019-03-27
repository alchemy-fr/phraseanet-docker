FROM phraseanet

RUN apt-get update && apt-get install -y \
        curl \
        nano \
        vim \
        git \
        zsh \
        telnet \
        autoconf \
        unzip \
        libtool \
        pkg-config \
        nasm \
	&& rm -rf /var/lib/apt/lists/*

RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && curl -LsS https://symfony.com/installer -o /usr/local/bin/symfony \
    && chmod a+x /usr/local/bin/symfony \
    && echo 'export PATH="$PATH:$HOME/.composer/vendor/bin"' >> /etc/zsh/zshrc

RUN curl -sL https://deb.nodesource.com/setup_10.x | bash - \
    && curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add - \
    && echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list \
    && apt-get update \
    && apt-get install -y \
        nodejs \
        yarn \
        libpng-dev \
        build-essential \
    && npm install -g \
        webpack \
        webpack-cli \
        newman \
    && mkdir -p /bootstrap/entrypoint.d \
	&& rm -rf /var/lib/apt/lists/*

COPY oh-my-zsh/.zshrc /bootstrap/.zshrc
COPY entrypoint.sh /bootstrap/entrypoint.sh
COPY entrypoint.d/* /bootstrap/entrypoint.d/
COPY oh-my-zsh/themes/alchemy.zsh-theme /home/app/.oh-my-zsh/themes/alchemy.zsh-theme
COPY install.sh /install.sh

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN chmod -R +x \
        /bootstrap/entrypoint.sh \
        /bootstrap/entrypoint.d/*.sh \
        /install.sh \
    && composer global require \
        friendsofphp/php-cs-fixer \
    && git clone https://github.com/robbyrussell/oh-my-zsh.git /bootstrap/.oh-my-zsh

USER app

ENTRYPOINT ["/bootstrap/entrypoint.sh"]

CMD ["/bin/zsh"]
