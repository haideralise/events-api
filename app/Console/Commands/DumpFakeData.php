<?php

namespace App\Console\Commands;

use App\Event;
use App\Game;
use App\Player;
use App\Roster;
use App\Team;
use App\Tournament;
use App\User;
use Illuminate\Console\Command;

class DumpFakeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'development:dump-fake-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dumps fake data';
    protected $factories;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->factories = [
          User::class,
       //   Game::class,
          Event::class,
          Tournament::class,
          Player::class,
          Team::class,
          Roster::class,
        ];
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->factories as $factory){
            factory($factory, 10)->create();
        }
    }
}
