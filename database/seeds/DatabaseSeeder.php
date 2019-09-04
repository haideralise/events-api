<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(StatusSeeder::class);
         $this->call(GameProficiencySeeder::class);
         $this->call(CountrySeeder::class);
         $this->call(StatesSeeder::class);
         $this->call(CitiesSeeder::class);
    }
}
