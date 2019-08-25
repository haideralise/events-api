<?php

use App\Table;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTournamentsTable extends Migration
{
    protected $table = Table::EVENT_TOURNAMENT;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('event_id');
            $table->unsignedBigInteger('tournament_id');

            $table->foreign('tournament_id')->references('id')->on(Table::TOURNAMENTS);
            $table->foreign('event_id')->references('id')->on(Table::EVENTS);

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
