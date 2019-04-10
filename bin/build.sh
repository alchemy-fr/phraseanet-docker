#!/bin/bash

set -e

docker-compose build phraseanet
docker-compose build worker
docker-compose build dev
docker-compose build elasticsearch
docker-compose build nginx
