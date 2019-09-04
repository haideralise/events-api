<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Game;
use App\Models\GameProficiency;
use App\Models\Player;
use App\Models\Roster;
use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Roster::class, function (Faker $faker) {

    $modesl = [
        ['rosterable_id' => Player::inRandomOrder()->first()->id, 'rosterable_type' => Player::class],
        ['rosterable_id' => Team::inRandomOrder()->first()->id, 'rosterable_type' => Team::class]
    ];
    $index = random_int(0,1);
    $record = $modesl[$index];
    $proficiency_id  = ($record['rosterable_type'] == Player::class) ? GameProficiency::inRandomOrder()->first()->id : null;
    return [
        'rosterable_id' => $record['rosterable_id'],
        'rosterable_type' => $record['rosterable_type'],
        'game_id' => Game::inRandomOrder()->first()->id,
        'proficiency_id' => $proficiency_id
    ];
});
