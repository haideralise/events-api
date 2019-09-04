<?php

use App\TableProperties;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    protected $table = TableProperties::EVENTS;
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
            $table->text('description');
            $table->string('header', 255)->nullable();
            $table->string('logo', 255)->nullable();

            $table->string('place');

            $table->unsignedBigInteger('creator_id');
            $table->unsignedBigInteger('status_id');

            $table->timestamp('held_at');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('status_id')->references('id')->on(TableProperties::STATUSES);
            $table->foreign('creator_id')->references('id')->on(TableProperties::USERS);

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
