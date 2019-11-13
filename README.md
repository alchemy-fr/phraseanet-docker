# Phraseanet Docker stack

## Prerequisites

- docker-compose
- docker >=v18.01-ce

## Preparation

Copy the `env.dist` file to an `.env` file and edit this file accordingly to your environment.
Choose a path on your host to mount the volumes.

Inside the directory, create the following subdirectories  :

    /config
    /config/templates/web
    /config/templates/mobile
    /logs
    /data
    /thumbnails


## Integration mode

The development and integration concerns are separated. On every `docker-compose` command, you can avoid working with `development-only` stuff by adding `-f docker-compose.yml` options on every `docker-compose  `commands.

To simply mount the service, run :

    docker-compose -f docker-compose.yml up -d

You can start your browser with localhost and the port you have configured on `.env`.
The default parametrers allow you to reach the app with : `http://localhost:8082`

To get logs :

    docker-compose logs -f

## build

To apply the last configuration changes made on every side service (db, elaticsearch. etc), run :

    docker-compose build

## Development mode

You need to mount your code onto the container via volumes
The var ALCHEMY_WORKSPACE_DIR must be set to the location of your workspace

## Credential

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
