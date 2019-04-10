# Phraseanet Docker stack

## Prerequisites

- docker-compose 

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

Using an [override](https://docs.docker.com/compose/reference/overview/#specifying-multiple-compose-files) file named `docker-compose.override.yaml` ensures that the production
configuration remains untouched.

As example, an override could look like this:

```yaml
version: '3.4'

services:
  phraseanet:
    environment:
      # See https://docs.docker.com/docker-for-mac/networking/#i-want-to-connect-from-a-container-to-a-service-on-the-host
      # See https://github.com/docker/for-linux/issues/264
      # The `remote_host` below may optionally be replaced with `remote_connect_back`
      XDEBUG_CONFIG: >-
        remote_enable=1
        remote_host=host.docker.internal
        remote_port=9001
        idekey=PHPSTORM
      # This should correspond to the server declared in PHPStorm `Preferences | Languages & Frameworks | PHP | Servers`
      # Then PHPStorm will use the corresponding path mappings
      PHP_IDE_CONFIG: serverName=phraseanet-docker
```

Then run:

````bash
docker-compose up -d
````

If `docker-compose.yml` and a `docker-compose.override.yml` are present on the same directory level, Docker Compose combines the two files into a single configuration, applying the configuration in the `docker-compose.override.yml` file over and in addition to the values in the `docker-compose.yml` file.

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
