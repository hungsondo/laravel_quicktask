#!/usr/bin/env bash

echo "====================================="
echo "||                                 ||"
echo "||         MOR SOFTWARE            ||"
echo "||       Copyright © 2021          ||"
echo "||                                 ||"
echo "====================================="

chmod 777 -Rf public/
chmod 777 -Rf storage/
composer install
composer dump-autoload
php artisan key:generate
php artisan migrate
php artisan jwt:secret
# php artisan db:seed --class=BranchSeeder
# php artisan db:seed --class=PrefecturesImportTableSeeder
# php artisan db:seed --class=CategorySeeder
# php artisan db:seed --class=OperatorSeeder
php artisan queue:restart
php-fpm
