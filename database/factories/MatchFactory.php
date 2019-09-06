<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Match;
use App\Models\Roster;
use App\Models\Game;
use App\Models\Status;
use Faker\Generator as Faker;

$factory->define(Match::class, function (Faker $faker) {
    $game_id = 1;
    $roster_id_1 = Roster::whereGameId($game_id)->inRandomOrder()->first()->id;
    $roster_id_2 = Roster::whereGameId($game_id)->where('id', '!=', $roster_id_1)->first()->id;
    return [
        'roster_id_1' => $roster_id_1,
        'roster_id_2' => $roster_id_2,
        'game_id' => $game_id,
        'status_id' => Status::inRandomOrder()->first()->id
    ];
});
