<?php

use App\TableProperties;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    protected $table = TableProperties::TOURNAMENTS;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('place');
            $table->text('description')->nullable();

            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('game_id');
            $table->unsignedBigInteger('status_id');

            $table->foreign('game_id')->references('id')->on(TableProperties::GAMES);
            $table->foreign('status_id')->references('id')->on(TableProperties::STATUSES);
            $table->foreign('creator_id')->references('id')->on(TableProperties::USERS);

            $table->unique(['title', 'game_id', 'creator_id']);

            $table->timestamp('held_at');
            $table->timestamps();
            $table->softDeletes();
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
