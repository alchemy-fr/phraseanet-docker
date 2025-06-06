# This docker and Compose deployment from Phraseanet is deprecated

> [!WARNING]
> This docker deployment is not maintained anymore and is not compliant with the latest Phraseanet versions
> Please use the Docker and docker-Compose file included in the main Phraseanet repository
    [here](https://github.com/alchemy-fr/Phraseanet#phraseanet-41---digital-asset-management-application).
>
> 



---

# Phraseanet Docker stack

This is an example Phraseanet docker-compose deployement for Phraseanet.

This deployment require some adaptation to the environement. 

For dev and test Phraseanet please use the docker-compose and dockerfile include in Phraseanet git repositorie 

https://github.com/alchemy-fr/Phraseanet

## Prerequisites

- docker-compose >=v1.25.4
- docker >=v18.01-ce

Note about elasticsearch container Check this link 
https://www.elastic.co/guide/en/elasticsearch/reference/current/docker.html#docker-prod-prerequisites



## Preparation

### Docker images

You have to build the phraseanet images from the Phraseanet repository (follow the README instruction inside it).

https://github.com/alchemy-fr/Phraseanet

Or use Phraseanet images from docker hub
Retrieve on Docker hub prebuilt images for Phraseanet.

https://hub.docker.com/r/alchemyfr/phraseanet-fpm

https://hub.docker.com/r/alchemyfr/phraseanet-worker

https://hub.docker.com/r/alchemyfr/phraseanet-nginx

https://hub.docker.com/repository/docker/alchemyfr/phraseanet-db

https://hub.docker.com/repository/docker/alchemyfr/phraseanet-elasticsearch

### Volumes

All the binding will be made inside one directory on your host : you have to create this dorectory at your prefered location.

Inside this directory, create the following subdirectories  :

    /config
    /logs
    /data
    /thumbnails
    /elasticsearch
    /custom
    /db

You can also let the helper `./bin/create-volume-dir.sh` create all theses directories for you :

    ./bin/create-volume-dir.sh <path_to_your_volume_dir>

### Environment

Copy the `env.dist` file to an `.env` file and edit this file accordingly to your environment,  especially :

* `PHRASEANET_DOCKER_TAG` : tag of the Docker images. Set it to the tag you choose during the build phase. By defaut, it's set to `master`.
* `VOLUMES_DIR` : the path you've chosen as volumes to store Phraseanet data on your host.
* `INSTALL_ACCOUNT_EMAIL` : the email address that will be used for the fist account
* `INSTALL_ACCOUNT_PASSWORD` : the according password
* `PHRASEANET_APP_PORT` : the port of the HTTP application (default=8082)

If you are not interested in the developpement of Phraseanet, you can ignore everything after the `DEV Purpose` annotation.

You can set every parameters according to your preferences.

### Run the service

To mount the service, go to the project root directory and run :

    docker-compose -f docker-compose.yml up -d

Why this option `-f docker-compose.yml` ?

The development and integration concerns are separated using a `docker-compose.override.yml`. By default, `docker-compose` will include this files if it exists.

If you don't work on phraseanet developpement, avoiding this `-f docker-compose.yml` parameters will throw errors. So you have to add this options on every `docker-compose` commands to avoid this inclusion.

You can also delete the `docker-compose.override.yml` to get free from this behavior.

### Using the application

You can start your browser with localhost and the port you have configured on `.env`.
The default parameters allow you to reach the app with : `http://localhost:8082`

### How to get application logs

Run the following command at the root directory level :

    docker-compose -f docker-compose.yml logs -f

### re-build application

To apply the last configuration changes made on every side service (db, elaticsearch. etc), run :

    docker-compose -f docker-compose.yml build

### Stop the application

You can stop the application with :

    docker-compose -f docker-compose.yml down

All your data will be kept for the next usage.


### Development mode

You need to mount your code onto the container via volumes
The var ALCHEMY_WORKSPACE_DIR must be set to the location of your `Phraseanet` workspace.

The developpement mode uses the `docker-compose-override.yml` file.

You can run it with :

    docker-compose up -d

To get logs :

    docker-compose logs -f


The environment is not yet ready : you have to fetch all dependencies.

This can be made easily from the phraseanet container :

    docker-compose exec -u app phraseanet make


# How to change volumes location

Before moving all the files, or to use a different location, you have to remove all containers and volume definitions with the following command :

    docker-compose down --volumes

Then move the files and set the `VOLUMES_DIR` to the new location.
