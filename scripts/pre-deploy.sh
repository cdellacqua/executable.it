#!/bin/bash

DATE=$(date --iso-8601=seconds)
cd .. && \
echo "Creating directory deploy-${DATE}" && \
mkdir deploy-${DATE} && \
cd deploy-${DATE} && \
echo "CWD to deploy-${DATE}" && \
git clone git@cdellacqua.gitlab.com:cdellacqua/www.executable.it.git . && \
rm -rf .git && \
composer install --no-interaction --prefer-dist --optimize-autoloader --no-dev && \
\
php artisan cache:clear && \
php artisan route:clear && \
php artisan config:clear && \
php artisan view:clear && \
php artisan config:cache && \
php artisan view:cache && \
npm install && \
npm run production && \
\
echo "Ready to upload"
echo "Deploy directory to upload: ${DATE}"
