# Phraseanet Docker stack

## Prerequisites

- docker-compose
- docker >=v18.01-ce

## Preparation

### Docker images

Using this docker-compose file will pull all required images from dockerhub except otherwise configured in the .env file.

### Volumes

All the binding will be made inside one directory on your host : you have to create this directorys at your prefered location.
All necessary directorys will be created when you pull from GitHub. If you decide to move them, you have to alter this in the `.env` file.
```
PHRASEANET_CONFIG_DIR=./config
PHRASEANET_LOGS_DIR=./logs
PHRASEANET_DATA_DIR=./datas
PHRASEANET_DB_DIR=./volumes/db
PHRASEANET_ELASTICSEARCH_DIR=./volumes/elasticsearch
PHRASEANET_THUMBNAILS_DIR=./www/thumbnails
PHRASEANET_CUSTOM_DIR=./www/custom
PHRASEANET_PLUGINS_DIR=./www/plugins
PHRASEANET_TMP_DIR=./tmp
PHRASEANET_CACHE_DIR=./cache
PHRASEANET_DOWNLOAD_DIR=./datas/download
PHRASEANET_LAZARET_DIR=./datas/lazaret
PHRASEANET_CAPTION_DIR=./tmp/caption
PHRASEANET_WORKER_TMP=./tmp/worker
```

### Environment

Edit the `.env` file according to your environment,  especially :

* `PHRASEANET_DOCKER_TAG` : tag of the Docker images. Best practice is to choose a specific release e.g. `4.1.2` and not latest.
* `PHRASEANET_ADMIN_ACCOUNT_EMAIL` : the email address that will be used for the fist account
* `PHRASEANET_ADMIN_ACCOUNT_PASSWORD` : the according password
* `PHRASEANET_APP_PORT` : the port of the HTTP application (default=8082)

You can set every parameters according to your preferences.

### Run the service

To run the service, go to the project root directory and run :

    docker-compose up -d

First start will take some time as databases will be created, and phraseanet setup is running.
You can verify by looking at the logs 

    docker-compose logs

### Using the application

You can start your browser with localhost and the port you have configured on `.env`.
The default parameters allow you to reach the app with : `http://localhost:8082`

### How to get application logs

Run the following command at the root directory level :

    docker-compose logs -f


### Stop the application

You can stop the application with :

    docker-compose down

All your data will be kept for the next usage.

# How to change volumes location

Before moving all the files, or to use a different location, you have to remove all containers and volume definitions with the following command :

    docker-compose down --volumes

Then move the files and configure `.env` to the new location.
