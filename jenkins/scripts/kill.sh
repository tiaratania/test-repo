#!/usr/bin/env sh

set -x
docker kill my-apache-php-app-1
docker rm my-apache-php-app-1

#test