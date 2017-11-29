# Laravel Countries

[![Total Downloads](https://poser.pugx.org/bhuvidya/laravel-countries/downloads.svg)](https://packagist.org/packages/bhuvidya/laravel-countries)
[![Latest Stable Version](https://poser.pugx.org/bhuvidya/laravel-countries/v/stable.svg)](https://packagist.org/packages/bhuvidya/laravel-countries)
[![Latest Unstable Version](https://poser.pugx.org/bhuvidya/laravel-countries/v/unstable.svg)](https://packagist.org/packages/bhuvidya/laravel-countries)

Laravel Countries is a bundle for Laravel, providing Almost ISO 3166_2, 3166_3, currency, Capital and more for all countries.

Bug kudos to Christoph Kempen, on whose work this package is **heavily** based (https://github.com/webpatser/laravel-countries). I ended up doing so many little changes that I thought it best to start my own package.

**Please note that tyhis package is for Laravel 5 only**

## Installation

Add `bhuvidya/laravel-countries` to `composer.json`.

    "bhuvidya/laravel-countries": "dev-master"
    
Run `composer update` to pull down the latest version of Country List.

**If you're using Laravel 5.5, you don't have to edit `app/config/app.php`.**

Edit `app/config/app.php` and add the `provider` and `filter`

    'providers' => [
        'Bhuvidya\Countries\CountriesServiceProvider',
    ]


## Model

You can start by publishing the configuration. This is an optional step, it contains the table name and does not need to be altered. If the default name `countries` suits you, leave it. Otherwise run the following command

    $ php artisan vendor:publish

Next generate the migration file:

    $ php artisan countries:migration
    $ composer dump-autoload
    
It will generate the `<timestamp>_setup_countries_table.php` migration and the `CountriesSeeder.php` seeder. To make sure the data is seeded insert the following code in the `seeds/DatabaseSeeder.php`

    //Seed the countries
    $this->call('CountriesSeeder');
    $this->command->info('Seeded the countries!'); 

You may now run it with the artisan migrate command:

    $ php artisan migrate --seed
    
After running this command the filled countries table will be available
