<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->integer('levels');
            $table->string('space_one')->nullable();
            $table->string('space_two')->nullable();
            $table->string('space_third')->nullable();
            $table->string('space_four')->nullable();
            $table->string('space_five')->nullable();
            $table->string('space_six')->nullable();
            $table->string('city');
            $table->integer('address_number');
            $table->string('phone');
            $table->string('email');
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
