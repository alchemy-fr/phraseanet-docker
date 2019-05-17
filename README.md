# Phraseanet Docker stack

## Prerequisites

- docker-compose
- docker >=v18.01-ce

## Preparation

Copy the `env.dist` file to an `.env` file and edit this file accordingly to your environment.

## Integration mode

    docker-compose -f docker-compose.yml up -d

To get logs :

    docker-compose logs -f

## Development mode

You need to mount your code onto the container via volumes
The var ALCHEMY_WORKSPACE_DIR must be set to the location of your workspace

## Development tools

Now, install the Phraseanet application and databases:

```bash
./bin/install.sh
```

Start your browser at: `http://localhost/`

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
