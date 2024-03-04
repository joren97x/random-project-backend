
## setup
place the project in xampp/htdocs
run dis commands in terminal
```bash
composer update
cp .env.example .env
php artisan key:generate
php artisan migrate
//Generate dummy datas(optional)
php artisan db:seed
```
