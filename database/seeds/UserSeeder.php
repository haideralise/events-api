<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 1)->create(['name' => 'admin', 'email' => 'admin@eventsApi.com']);
        factory(User::class, 1)->create(['name' => 'user', 'email' => 'user@eventsApi.com']);
    }
}
