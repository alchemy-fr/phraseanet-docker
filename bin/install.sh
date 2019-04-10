#!/bin/bash

set -e

bin/build.sh

docker-compose run --rm dev /install.sh
