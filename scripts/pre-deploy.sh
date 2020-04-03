#!/bin/bash

rm -rf deploy && \
mkdir deploy && \
cd deploy && \
git clone git@cdellacqua.gitlab.com:cdellacqua/www.executable.it.git . && \
rm -rf .git && \
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev && \
\
php artisan cache:clear && \
php artisan route:clear && \
php artisan config:clear && \
php artisan view:clear && \
npm install && \
npm run production && \
\
echo "Ready to upload"
