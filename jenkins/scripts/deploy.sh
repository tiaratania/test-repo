#!/usr/bin/env sh

set -x

# Create the network if it doesn't already exist
docker network ls | grep -q test-repo-net || docker network create test-repo-net

echo 'Now...'
docker run -d --network test-repo-net -p 84:80 --name my-apache-php-app -v /Users/tiara/Documents/GitHub/test-repo/src:/var/www/html php:7.2-apache
sleep 1
set +x

echo 'Now...'
echo 'Visit http://localhost:84/ to see your PHP application in action.'
