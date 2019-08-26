<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use App\GamePlayer;
use App\GameProficiency;
use App\Player;
use Faker\Generator as Faker;

$factory->define(GamePlayer::class, function (Faker $faker) {
    return [
        'game_id' => Game::inRandomOrder()->first()->id,
        'player_id' => Player::inRandomOrder()->first()->id,
        'proficiency_id' => GameProficiency::inRandomOrder()->first()->id,

    ];
});
