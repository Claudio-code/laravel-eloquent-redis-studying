#!/bin/bash

mkdir docker/dbdata

composer install && npm install

php-fpm
