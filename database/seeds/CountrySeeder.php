<?php

use App\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(public_path('countries/countries.json'));
        $countries = json_decode($json);
        foreach ($countries as $country) {
            Country::firstOrCreate((array) $country);
        }
    }
}
