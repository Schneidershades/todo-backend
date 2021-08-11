Installation:

Clone the repository

cd todo-backend/

cp .env.example .env

Set these values in .env

DB_DATABASE=localhost

DB_USERNAME=root

DB_PASSWORD=

php artisan key:generate

composer install

php artisan migrate

Navigate to http://localhost:8000 in your browser

Run Tests:
php artisan test


SQL file is in the root folder