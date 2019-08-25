<?php

use App\State;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File as FileAlias;

class StatesSeeder extends Seeder
{

    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function run()
    {
        $json = FileAlias::get(public_path('countries/states.json'));
        $states = json_decode($json);
        foreach ($states as $state) {
            State::firstOrCreate( (array) $state);
        }
    }
}
