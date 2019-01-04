#!/bin/sh

set -e


if [ ! -d "/var/Phraseanet/Phraseanet/vendor" ]
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
    
    bin/setup system:config set registry.general.title "docker-dev sandbox maillat"
   
    ## change elasticsearch server host and create index
    #sed -i 's/host: localhost/host: elasticsearch/g' /var/Phraseanet/Phraseanet/config/configuration.yml 
   
    bin/setup system:config set main.search-engine.options.host elasticsearch
    bin/setup system:config set main.search-engine.options.minScore 2
    bin/setup system:config set main.search-engine.options.base_aggregate_limit 10
    bin/setup system:config set main.search-engine.options.collection_aggregate_limit 10
    bin/setup system:config set main.search-engine.options.doctype_aggregate_limit 10
    bin/console compile:configuration
    bin/console searchengine:index -c

    ## enable API and disable ssl on it
    bin/setup system:config set registry.api-clients.api-enabled true
    bin/setup system:config set main.api_require_ssl false
    bin/console comp:conf
    

    ## create supervisord job

    # to do 

    ## edit subdef task setting

    # to do 

  

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

## set debuger allowed Ip.

cd /var/Phraseanet/Phraseanet/
bin/setup system:config set debugger.allowed-ips 0.0.0.0
bin/console comp:conf

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

exec "$@"