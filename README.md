# docker-private

## Orgnisation WIP 

- docker-compose/test.
  - For testing Phraseanet in diferent archi/version 
    ex : load balanced , elasticsearch cluster , but only working deployment.

- docker-compose/sandbox 
  - For Playing  and learn docker.

- docker-compose/dev
  - For dev on Phraseanet.

- docker-compose/demo 
  - For customers testing a generate virtual machine for demo , need to be public.

- docker-compose/prod
  - For deploy somme client on other infra (later)


All deployment use the futur "Phraseanet docker image", publish on docker hub.

## More 

See also doc in confluence 

https://phraseanet.atlassian.net/wiki/spaces/PHRAS/pages/573571073/Docker+notes+de+formations+du+10+d+cembre+2018

## To do  

For dev deployment

Add to git ignore, all containers  generated files
 - mysql database
 - Phraseanet source
 - elasticindex

Publish docker-compose/demo on public repo.



## Complement

You can find a standard dataset here


- Base Parade.

  - With HD  ( size 3,5 go )

    https://s3-eu-west-1.amazonaws.com/alchemy-datasets-test/db_alch_dataset_parade_v02.zip

  - Without HD 
    To do

