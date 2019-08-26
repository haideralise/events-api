<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\City;
use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'bio' => $faker->paragraph,
        'city_id' => City::inRandomOrder()->first()->id,
    ];
});