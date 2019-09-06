<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\TableProperties;

class CreateMatchesTable extends Migration
{
    protected $table = TableProperties::MATCHES;
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
            $table->unsignedBigInteger('tournament_id')->nullable();
            $table->unsignedBigInteger('roster_id_1');
            $table->unsignedBigInteger('roster_id_2');
            $table->unsignedBigInteger('status_id');

            $table->foreign('roster_id_1')->on(TableProperties::ROSTERS)->references('id');
            $table->foreign('roster_id_2')->on(TableProperties::ROSTERS)->references('id');
            $table->foreign('game_id')->on(TableProperties::GAMES)->references('id');
            $table->foreign('tournament_id')->on(TableProperties::TOURNAMENTS)->references('id');
            $table->foreign('status_id')->on(TableProperties::STATUSES)->references('id');

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
