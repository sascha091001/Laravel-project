<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArrivalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrivals', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('driver_id')->unsigned();
			$table->integer('route_id')->unsigned();
			$table->integer('car_id')->unsigned();
			$table->date('date_of_departure');
			$table->date('date_of_arrival')->nullable();
			$table->foreign('driver_id')->references('id')->on('drivers');
			$table->foreign('route_id')->references('id')->on('routes');
			$table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrivals');
    }
}
