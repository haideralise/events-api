<?php

use App\Status;
use App\Table;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        foreach (Status::availableStatuses() as $id => $status) {
            Status::firstOrCreate([
                'id' => $id,
                'title' => $status
            ]);
        }
        Model::reguard();
    }
}
