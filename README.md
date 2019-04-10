# Phraseanet Docker stack

## Prerequisites

- docker-compose
- docker >=v18.01-ce

## Installation

Define the local path where you want to store the Alchemy source code on your host:

```bash
# ~/.profile

export ALCHEMY_WORKSPACE_DIR=/path/to/my/workspace
```
> Make sure to set an absolute path.

Every project or application will sit in this folder.

Don't forget to refresh your current shell:
```bash
source ~/.profile
```

Now, install the Phraseanet application and databases:

```bash
./bin/install.sh
```

You're ready to run the docker stack:

```bash
docker-compose up -d
```

Start your browser at: `http://localhost/`

### Credential 

- user: `admin@phrdocker.dev`
- password: `admin`

## Development

```bash
bin/shell.sh
```

If you need root access, you can run:
```bash
bin/shell.sh root
```
> Please consider updating the Dockerfile when you deal with system or programs

## Changing web server port

By default phraseanet application binds port 80.
You can change it by overriding `PHRASEANET_APP_PORT` env var.

```bash
# ~/.profile

export PHRASEANET_APP_PORT=8099
```

## Services

### PhpMyAdmin

Go to `http://localhost:8080/`

You can also change the port by setting `PHPMYADMIN_PORT` env var.

### RabbitMQ Management

Go to `http://localhost:8081/`

You can also change the port by setting `RABBITMQ_MANAGEMENT_PORT` env var.

## Debug

To see what's happening in application you can watch the `phraseanet` container's logs:

```bash
docker-compose logs -f phraseanet
```

### Configure Xdebug with Docker Compose Override

Server name defaults to `phraseanet-docker`. You should use this value in your IDE.
If you use PHPStorm, go to `Preferences | Languages & Frameworks | PHP | Servers` and set this server name.
Then PHPStorm will use the corresponding path mappings.

#### Enable/Disable XDebug in web server

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


### More

You can find a dataset here:

 TODO

## To do

- Split Phraseanet Container, one for fpm  one for worker
- Define user name based on argument 
- Documentation of host setting for debug url 
