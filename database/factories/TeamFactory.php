<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Team;
use App\User;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->name,
        'creator_id' => User::inRandomOrder()->first()->id
    ];
});
