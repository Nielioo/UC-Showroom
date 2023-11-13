# UC-Showroom
For certification purpose by LSP UC on November 2023

## Getting started

Assuming you've already installed on your machine: PHP (>= 8.1.0), [Laravel](https://laravel.com), [Composer](https://getcomposer.org) and [Node.js](https://nodejs.org).

``` bash
# install dependencies
composer install
npm install

# create .env file and generate the application key
cp .env.example .env
php artisan key:generate

php artisan storage:link

# build CSS and JS assets
npm run dev
```

Then launch the server:

``` bash
php artisan serve
```

## Testing

``` bash
# make a new test
php artisan make:test ExampleTest

# run all test
php artisan test

# run specific test
php artisan test --filter=ExampleTest

```
