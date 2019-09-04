<?php

use App\TableProperties;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRostersTable extends Migration
{
    protected $table = TableProperties::ROSTERS;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rosterable_id');
            $table->string('rosterable_type');
            $table->unsignedBigInteger('game_id');
            $table->foreign('game_id')->on(TableProperties::GAMES)->references('id');
            $table->unsignedBigInteger('proficiency_id')->nullable();
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
