#!/bin/sh

set -e

su app -s /bin/bash -c "/entrypoint/install.sh"

# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi
service supervisor start

exec "$@"
