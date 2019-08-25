<?php

use App\Table;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    protected $table = Table::TOURNAMENTS;
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

            $table->foreign('game_id')->references('id')->on(Table::GAMES);
            $table->foreign('status_id')->references('id')->on(Table::STATUSES);
            $table->foreign('creator_id')->references('id')->on(Table::USERS);

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
