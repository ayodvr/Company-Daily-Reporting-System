#!/bin/bash

php artisan serve & sleep 5

./vendor/bin/phpunit
