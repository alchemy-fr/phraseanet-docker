#!/bin/sh

set -e

if [ ! -f "/var/Phraseanet/README.md" ]
then
	curl -o /tmp/Phraseanet.zip https://www.phraseanet.com/builds/alchemy-fr-Phraseanet-v4.0.3.zip
	unzip /tmp/Phraseanet.zip -d /var/ 2> /dev/null || true
	cp /var/configuration-compiled.php /var/Phraseanet/config/configuration-compiled.php
    cp /var/configuration.yml /var/Phraseanet/config/configuration.yml
    cp /var/proxies/* /var/Phraseanet/resources/proxies/
    
fi	


# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

exec "$@"


