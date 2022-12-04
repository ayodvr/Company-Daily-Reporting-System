#!/bin/bash

apt -qy update

docker-php-ext-install pdo_msql ctype bcmath zip

curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

apt -qy install npm
