# Steps for git clone
Clone this Repo
Make sure you have php and composer installed in your system.
cd to the main folder of the repo.
Type composer install
Type chmod -R 777 bootstrap/cache
Type cp .env.example .env
Type php artisan key:generate
Start mysql service mysql start
Type php artisan migrate
To see the webpage type php artisan serve
Goto localhost:8000
