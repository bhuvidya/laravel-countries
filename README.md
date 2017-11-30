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


## Configuration

You can elect to manage your own configuration. This is an optional step, it only contains the table name and does
not need to be altered. If the default name `countries` suits you, leave it. Otherwise run the following command

    $ php artisan vendor:publish --provider='Bhuvidya\Countries\CountriesServiceProvider'

The config file can then be found at `config/countries.php`.


## Migrations

The service provider automatically adds the package's migrations to your app.


## Seeding

There is a seeding module in the package. You can either run the seeder manually from the command line:

    $ php artisan db:seed --class='Bhuvidya\Countries\CountriesSeeder'

Otherwise you can add it to one of your app's database seeder files, probably `database/seeds/DatabaseSeeder:

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

