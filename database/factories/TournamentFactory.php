<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Game;
use App\Models\Status;
use App\Models\Tournament;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Tournament::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->paragraph,
        'held_at' => Carbon::now(),
        'game_id' => Game::inRandomOrder()->first()->id,
        'creator_id' => User::inRandomOrder()->first()->id,
        'place' => $faker->address,
        'status_id' => Status::inRandomOrder()->first()->id
    ];
});
