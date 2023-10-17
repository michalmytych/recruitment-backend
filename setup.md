# SETUP

```bash
composer install
cp .env.example .env
# Fill database credentials
php artisan key:generate
php artisan config:cache
php artisan migrate
php artisan db:seed
php artisan serve
# In another terminal:
npm install
php artisan optimize:clear
npm run dev
```
### Another option
Also, __Laravel Sail__ is installed in this project. [See more.](https://laravel.com/docs/10.x/sail)

