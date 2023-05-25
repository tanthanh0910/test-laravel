## How to start project

Install packages
```
composer install
```
Create .env file from .env.example 
```
cp .env.example .env
```
Create database for the project. And config in .env file. For example:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_username
DB_PASSWORD=pass
```
Migrate database
```
php artisan migrate
```
Generate key
```
php artisan key:generate
```
Start server on default port 8000
```
php artisan serve
```
http://127.0.0.1:8000/login
