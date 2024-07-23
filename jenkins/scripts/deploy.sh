#!/usr/bin/env sh

set -x


echo 'Now...'
# Ensure you change the network to jenkins-php-selenium-test-1_jenkins-net
docker run -d --network jenkins-php-selenium-test-1_jenkins-net -p 85:80 --name my-apache-php-app-1 -v /Users/tiara/Documents/GitHub/test-repo/src:/var/www/html php:7.2-apache
sleep 1
set +x

echo 'Now...'
echo 'Visit http://localhost:85/ to see your PHP application in action.'
