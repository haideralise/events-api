<?php

use App\TableProperties;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    protected $table = TableProperties::PLAYERS;
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->text('bio')->nullable();

            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on(TableProperties::CITIES);

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
