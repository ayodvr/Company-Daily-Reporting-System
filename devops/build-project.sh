#!/bin/bash

composer install --no-interaction

# composer update

# composer require --dev phpunit/phpunit ^9

npm install

ln -f -s .env.pipelines .env

php artisan migrate --no-interaction
php artisan key:generate

npm run prod

