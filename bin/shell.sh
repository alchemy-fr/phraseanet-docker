#!/bin/bash

USER=${1:-"app"}

docker-compose run --user=$USER --rm dev
