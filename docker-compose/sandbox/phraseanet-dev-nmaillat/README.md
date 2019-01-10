# docker-private for Dev WIP

here a deployment for dev on Phraseanet

## Dev workflow 

### Back dev 

git clone this repo https://github.com/alchemy-fr/docker-private/

git clone Phraseanet https://github.com/alchemy-fr/phraseanet



### For front dev
git clone 
git clone Phraseanet-production-client https://github.com/alchemy-fr/phraseanet-production-client
git clone Phraseanet-production-client https://github.com/alchemy-fr/phraseanet-common
git clone Phraseanet-production-client https://github.com/alchemy-fr/embed-bundle


### setting
IN /docker-compose.yml
edit file path of container FS 
set path for container FS to your Phraseanet cloned repo (absolute path is recomanded)

 - docker-compose build
 - docker-compose up

For front dev worflow referer to confluence, but it's same of vagrant referer


### Credential 

Phraseanet credential is define in docker-entrypoint.sh of PHP 

#### Phraseanet user: 
- admin@phrdocker.dev / admin

#### mariadb:
- root/root

#### elasticsearch securitie.
- not set

#### Url availlable 
127.0.0.1

### To do

- Define Phraseanet user based on argument. 

- Documentation of host setting for debug url. 
