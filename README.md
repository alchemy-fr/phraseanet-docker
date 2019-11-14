# Phraseanet Docker stack

## Prerequisites

- docker-compose
- docker >=v18.01-ce

## Preparation

### Docker images

You have to build the phraseanet images from the Phraseanet repository (follow the README instruction inside it).

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

    docker-compose run phraseanet make



### Credential

- user: `admin@phrdocker.dev`
- password: `admin`

```bash
bin/shell.sh
```

If you need root access, you can run:
```bash
bin/shell.sh root
```

### Configure Xdebug with Docker Compose Override

Server name defaults to `phraseanet-docker`. You should use this value in your IDE.
If you use PHPStorm, go to `Preferences | Languages & Frameworks | PHP | Servers` and set this server name.
Then PHPStorm will use the corresponding path mappings.

### Enable/Disable XDebug in web server

```bash
. bin/xdebug-enable.sh
# or
. bin/xdebug-disable.sh
```

> Attention! XDebug enabling is base on environment variable. So XDebug will only be enabled if your run docker-compose commands from the same shell.

#### Enable/Disable XDebug in dev container

```bash
bin/shell.sh

. docker-xdebug-enable
# or
. docker-xdebug-disable

```

> Don't forget the dot `.` before `docker-xdebug-enable`!

## Troubleshooting

Help! I get the following error:

- `Error response from daemon: error while mounting volume '/var/lib/docker/volumes/phraseanet_alchemy_vol/_data': error while mounting volume with options: type='none' device='/var/alchemy' o='bind': no such file or directory`
 You may have forgotten to define your `ALCHEMY_WORKSPACE_DIR` environment variable.
