## Installation

Define the local path where you want to store the phraseanet source code:

```bash
# ~/.profile

export PHRASEANET_APP_DIR=/path/to/phraseanet-app
```
> Make sure to set an absolute path.

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

user: `admin@phrdocker.dev`
password: `admin`

## Development

```bash
docker-compose run dev
```

## Debug

To see what's happening in application you can watch the `phraseanet` container's logs:

```bash
docker-compose logs -f phraseanet
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
