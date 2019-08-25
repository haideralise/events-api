<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use App\Status;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Model;

$factory->define(Game::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->colorName,
        'status_id' => Status::inRandomOrder()->first()->id
    ];

});
