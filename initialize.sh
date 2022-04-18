#!/bin/bash

# Initialize new Laravel project

# Installing dependencies using composer
composer install --no-interaction --quiet
# Activating generated example .env file
mv .env.example .env
# Generate new application key
php artisan key:generate
# Installing nodejs dependencies
npm install --silent
# Generate front-end assets
npm run prod
# Creating an empty database file for migrations
touch ./database/db.sqlite