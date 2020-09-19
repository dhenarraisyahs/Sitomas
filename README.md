-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).
# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/5.4/installation#installation)


Switch to the repo folder

    cd sitomas

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate
    
Run the database migrations (**Set .env dahulu jangan lupa**)

    php artisan migrate:refresh --seed
    
To create the symbolic link, you may use the storage:link Artisan command:

    php artisan storage:link

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

## Installation Phyton Script

Use the package manager [pip](https://pip.pypa.io/en/stable/) to install yfinance.

```bash
pip install yfinance
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
