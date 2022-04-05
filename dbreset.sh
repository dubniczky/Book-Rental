rm ./database/db.sqlite
touch ./database/db.sqlite
php artisan migrate
php artisan db:seed