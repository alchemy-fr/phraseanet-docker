#!/bin/sh

set -e


if [ ! -d "/var/Phraseanet/www" ]
then
		
	git clone https://github.com/alchemy-fr/Phraseanet.git /tmp/Phraseanet
	#cd /var/Phraseanet/
	#git init
    #git remote add origin https://github.com/alchemy-fr/Phraseanet.git 
    #git pull origin master
    mv /tmp/Phraseanet/* /var/Phraseanet/
    cd /var/Phraseanet/
    export HOME=/var/Phraseanet/
    make
fi

if [ ! -f "/var/Phraseanet/config/configuration.yml" ]
then
	cd /var/Phraseanet/
	mkdir Phrasea_datas
   

    #### Phraseanet install 
    bin/setup system:install --email=admin@phrdocker.dev --password=admin --db-host=db --db-port=3306 --db-user=root --db-password=root --db-template=en-simple --appbox=ab_master --databox=db_databox1 --server-name=Alchemy-dockerdev.dck --data-path=/var/Phraseanet/Phrasea_datas -y
    



fi	



# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

exec "$@"


