# Phraseanet Docker stack

## Prerequisites

- docker-compose >= 1.24.1
- docker >=v18.01-ce

The phraseanet Docker images are build and tagged from the `Phraseanet` git repository, according to its `README.md` file.

## Environment configuration

Copy the `env.dist` file to an `.env` file and edit this file accordingly to your environment.

In particular, a `VOLUMES_DIR` var allow you to define a location on your host where to mount the volumes.

Inside this directory, create the following subdirectories  :

    /config/web/templates
    /logs
    /data
    /thumbnails

## Integration mode VS developpement mode

You can run the service using two different modes.

If you don't expect to work on the development of the application, you may choose this mode.
You simply have to remove the `docker-compose.override.yml`, as this file contain only the development mode concerns.

If you have to work on the project, you need to specify the workspace by setting `ALCHEMY_WORKSPACE_DIR` with the root of your workspace application.

## Development mode

You don't have to install any PHP version on your host, nor any vendor library yourself.
As the code doesn't carry any copy of vendor library, you have to import these libraries with the following command :

    docker-compose run phraseanet make

Each time you add a new vendors, you will have to run this command.

You aslo need to re-deploy the application (see the folowing)

# Deploy the application

At the root of the project directory, run the following :

    docker-compose build && docker-compose up -d

This entire command have to be run to apply the last configuration changes made on every side service (db, elaticsearch).
In dev mode, every changes in the application code will be applied automatically.


# Browse the application

The default parameters allow you to reach the app on the url : `http://localhost:8082`

You can watch the application logs with :

    docker-compose logs -f

Additionnal logs information are presents in the `/logs` directory.


# Troubleshooting

Help! I get the following error:

- `Error response from daemon: error while mounting volume '/var/lib/docker/volumes/phraseanet_alchemy_vol/_data': error while mounting volume with options: type='none' device='/var/alchemy' o='bind': no such file or directory`
 You may have forgotten to define your `ALCHEMY_WORKSPACE_DIR` environment variable.
