<?php

use App\City;
use App\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FileAlias;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = FileAlias::get(public_path('countries/cities.json'));
        $cities = json_decode($json);
        foreach ($cities as $city) {
            City::firstOrCreate( (array) $city);
        }
    }
}
