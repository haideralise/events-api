<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
    'title' => $faker->title,
    'description' => $faker->paragraph,
    'held_at' => Carbon::now(),
    'creator_id' => User::inRandomOrder()->first()->id,
    'place' => $faker->address,
    'status_id' => Status::inRandomOrder()->first()->id
    ];
});
