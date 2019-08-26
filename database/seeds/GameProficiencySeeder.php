<?php

use App\GameProficiency;
use Illuminate\Database\Seeder;

class GameProficiencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (GameProficiency::proficiencies() as $proficiency) {
            GameProficiency::firstOrCreate($proficiency);
        }
    }
}
