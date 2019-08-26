<?php

use App\TableProperties;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamePlayersTable extends Migration
{
    protected $table = TableProperties::GAME_PLAYER;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('proficiency_id');

            $table->foreign('game_id')->references('id')->on(TableProperties::GAMES);
            $table->foreign('player_id')->references('id')->on(TableProperties::PLAYERS);
            $table->foreign('proficiency_id')->references('id')->on(TableProperties::GAME_PROFICIENCIES);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->table);
    }
}
