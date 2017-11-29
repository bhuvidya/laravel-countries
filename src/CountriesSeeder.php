<?php

namespace Bhuvidya\Countries;

use Illuminate\Database\Seeder;
use DB;

class CountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = @json_decode(file_get_contents(realpath(__DIR__ . '/../seeds/countries.json'), true));

        DB::table(config('countries.table_name'))->delete();

        foreach ($countries as $countryId => $country) {
            DB::table(config('countries.table_name'))->insert(array(
                // 'id' => $countryId,
                'capital' => $country['capital'] ?? null,
                'citizenship' => $country['citizenship'] ?? null,
                'country_code' => $country['country-code'],
                'currency' => $country['currency'] ?? null,
                'currency_code' => $country['currency_code'] ?? null,
                'currency_sub_unit' => $country['currency_sub_unit'] ?? null,
                'currency_decimals' => $country['currency_decimals'] ?? null,
                'full_name' => $country['full_name'] ?? null,
                'iso_3166_2' => $country['iso_3166_2'],
                'iso_3166_3' => $country['iso_3166_3'],
                'name' => $country['name'],
                'region_code' => $country['region-code'],
                'sub_region_code' => $country['sub-region-code'],
                'eea' => (bool) $country['eea'],
                'calling_code' => $country['calling_code'],
                'currency_symbol' => $country['currency_symbol'] ?? null,
                'flag' => $country['flag'] ?? null,
            ));
        }
    }
}
