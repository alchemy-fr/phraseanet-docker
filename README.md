## Installation

Define the local path where you want to store the phraseanet source code:

```bash
# ~/.profile

export PHRASEANET_APP_DIR=/path/to/phraseanet-app
```
> Make sure to set an absolute path.

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
docker-compose run dev
```

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

If `docker-compose.yaml` and a `docker-compose.override.yaml` are present on the same directory level, Docker Compose combines the two files into a single configuration, applying the configuration in the `docker-compose.override.yaml` file over and in addition to the values in the `docker-compose.yaml` file.

### Changing port

By default application binds port 80.
You can change it by overriding `PHRASEANET_APP_PORT` env var.

```bash
# ~/.profile

export PHRASEANET_APP_PORT=8099
```

### More


for front dev worflow referer to confluence, but it's same of vagrant referer

See also doc in [confluence](https://phraseanet.atlassian.net/wiki/spaces/PHRAS/pages/573571073/Docker+notes+de+formations+du+10+d+cembre+2018)


You can find a dataset here:

- Base Parade.
  - [With HD](https://s3-eu-west-1.amazonaws.com/alchemy-datasets-test/db_alch_dataset_parade_v02.zip) (3,5Go)
    
  - Without HD 
    TODO

## To do

- Split Phraseanet Container, one for fpm  one for worker
- Define user name based on argument 
- Documentation of host setting for debug url 
