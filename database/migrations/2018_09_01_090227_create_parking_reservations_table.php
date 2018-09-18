<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parking_model_id')->unsigned();
            $table->integer('parking_space_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('payment_status')->default('pending');
            //error
            //pending
            //success
            $table->date('from');
            $table->date('to');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('parking_model_id')->references('id')->on('parking_models')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('parking_space_id')->references('id')->on('parking_spaces')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')
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
        Schema::dropIfExists('parking_reservations');
    }
}
