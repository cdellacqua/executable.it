#!/bin/bash

php artisan config:clear
php artisan view:clear
npm run production
composer dump-autoload
