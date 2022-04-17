#!/bin/sh

composer install

npm install
npm run prod

php artisan migrate:fresh
php artisan db:seed