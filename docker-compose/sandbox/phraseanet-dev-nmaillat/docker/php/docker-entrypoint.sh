#!/bin/sh

set -e


if [ ! -e "/var/Phraseanet/Phraseanet/vendor/" ]
then
    chown www-data: -R /var/www
    
    #### install Phraseanet dependecies 
    su www-data -s /bin/sh
    export HOME=/var/wwww/
    #env | grep HOME > /var/www/test.txt
    #env | grep HOME > /var/Phraseanet/test.txt
    cd /var/Phraseanet/Phraseanet
    make
fi

if [ ! -f "/var/Phraseanet/Phraseanet/config/configuration.yml" ]
then
cd /var/Phraseanet/Phraseanet/
   
    

    #### Phraseanet install 
    bin/setup system:install --email=admin@phrdocker.dev --password=admin --db-host=db --db-port=3306 --db-user=root --db-password=root --db-template=en-simple --appbox=ab_master --databox=db_databox1 --server-name=Alchemy-dockerdev.dck --data-path=/var/Phraseanet/Phrasea_datas -y
    
    ## change elasticsearch server host and create index
    sed -i 's/host: localhost/host: elasticsearch/g' /var/Phraseanet/Phraseanet/config/configuration.yml 

    bin/console comp:conf
    bin/console searchengine:index -c


    #### download and install package version
    
	#curl -o /tmp/Phraseanet.zip https://www.phraseanet.com/builds/alchemy-fr-Phraseanet-v4.0.3.zip
	#unzip /tmp/Phraseanet.zip -d /var/ 2> /dev/null || true
	#bin/setup system:install --email=admin@phrdocker.dev --password=admin --db-host=db --db-port=3306 --db-user=root --db-password=root --db-template=en-simple --appbox=ab_master --databox=db_databox1 --server-name=Alchemy-dockerdev.dck --data-path=/var/Phraseanet/Phrasea_datas -y
    
    # with dataset for Application Box and databox 
	#cp /var/configuration-compiled.php /var/Phraseanet/config/configuration-compiled.php
    #cp /var/configuration.yml /var/Phraseanet/config/configuration.yml
    #cp /var/proxies/* /var/Phraseanet/resources/proxies/
    
    # Create ElasticSearch indexes
    # bin/console s:i:c

fi	


# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

exec "$@"