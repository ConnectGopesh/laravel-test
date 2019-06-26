# Hotel Booking Test Application

Hotel Booking Test Application
___
## Local Development Installation
1. Clone repository to local environment
    1. __Run:__ git clone https://github.com/ConnectInfosoftTech/laravel-test.git
2. Install Dependencies via Composer and Npm
    1. __Run:__ composer install
    2. __Run:__ npm install
3. Copy [.env.example] to [.env]
    1. __Run:__ cp .env.example .env
    2. Update .env with local environment details
        1. All of the generic laravel configurations such as App, Database and Mail variables       
4. Generate Application Key
    1. __Run:__ php artisan key:generate
5. Run Database Migrations
    1. __Run:__ php artisan migrate
6. Seed Database
    1. __Run:__ php artisan db:seed
7. Clear and Re-Cache Autoload, Configuration and more
    1. __Run:__ php artisan clear-compiled
    1. __Run:__ composer dump-autoload
    1. __Run:__ php artisan config:cache
8. Setup Local Host Master 

    
## 1 - Database Models & Migrations
Here you will discover a mixed list of all the database schema migrations and the corresponding models.

Migrations Location = `database\migrations`