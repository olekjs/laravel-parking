<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level_id');
            $table->string('city');
            $table->integer('address_number');
            $table->string('phone');
            $table->string('email');
            $table->integer('level_total');
            $table->integer('spaces_total');
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
        Schema::dropIfExists('parking_models');
    }
}
