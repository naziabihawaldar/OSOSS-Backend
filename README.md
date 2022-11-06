



set database config at .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_product
DB_USERNAME=root
DB_PASSWORD=
```

open cmd go to project directory
## Install All Packages of laravel
run code:
```
composer install
php artisan migrate --seed
php artisan passport:install
php artisan serve
```

default email and password for admin access

```
email: user1@demo.com
password: user1
```