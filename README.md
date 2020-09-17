# Laravel Countries

[![License](https://poser.pugx.org/bhuvidya/laravel-countries/license?format=flat-square)](https://packagist.org/packages/bhuvidya/laravel-countries)
[![Total Downloads](https://poser.pugx.org/bhuvidya/laravel-countries/downloads?format=flat-square)](https://packagist.org/packages/bhuvidya/laravel-countries)
[![Latest Stable Version](https://poser.pugx.org/bhuvidya/laravel-countries/v/stable?format=flat-square)](https://packagist.org/packages/bhuvidya/laravel-countries)
[![Latest Unstable Version](https://poser.pugx.org/bhuvidya/laravel-countries/v/unstable?format=flat-square)](https://packagist.org/packages/bhuvidya/laravel-countries)


**Note I have now switched the semver versioning for my Laravel packages to "match" the latest supported Laravel version.**

Laravel Countries is a bundle for Laravel, providing ISO 3166_2, 3166_3, currency, capitals and more for all countries.

Big kudos to Christoph Kempen, on whose work this package is **heavily** based (https://github.com/webpatser/laravel-countries). I ended up doing so many little changes that I thought it best to start my own package. And this is the first
package I have put together and added to Packagist etc, so I was keen to learn the whole process!

**Please note that this package was tested on Laravel 5.5 - I cannot guarantee it will work on earlier versions. Sorry.**

## Installation

Add `bhuvidya/laravel-countries` to your app:

    $ composer require "bhuvidya/laravel-countries"
    

**If you're using Laravel 5.5, you don't have to edit `app/config/app.php`.**

Otherwise, edit `app/config/app.php` and add the service provider:

    'providers' => [
        'Bhuvidya\Countries\CountriesServiceProvider',
    ]


## Configuration

You can elect to manage your own configuration. This is an optional step, it only contains the table name and does
not need to be altered. If the default table name `countries` suits you, leave it. Otherwise run the following command

    $ php artisan vendor:publish --provider='Bhuvidya\Countries\CountriesServiceProvider' --tag=config

The config file can then be found at `config/countries.php`.


## Migrations

The service provider automatically adds the package's migrations to your app.


## Seeding

There is a seeding module in the package. You can either run the seeder manually from the command line:

    $ php artisan db:seed --class='Bhuvidya\Countries\CountriesSeeder'

Otherwise you can add it to one of your app's database seeder files, probably `database/seeds/DatabaseSeeder.php`:

    use Bhuvidya\Countries\CountriesSeeder;

    /**  
     * Run the database seeds.
     *    
     * @return void 
     */ 
    public function run()
    {        
        ...
        $this->call(CountriesSeeder::class);
        ...
    }

