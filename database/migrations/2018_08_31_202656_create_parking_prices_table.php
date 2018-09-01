<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('level_id');
            $table->integer('parking_space_id')->unsigned();
            $table->string('reservations')->default(0);
            $table->string('price');
            $table->timestamps();

            $table->foreign('parking_space_id')->references('id')->on('parking_spaces')
                ->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_prices');
    }
}
