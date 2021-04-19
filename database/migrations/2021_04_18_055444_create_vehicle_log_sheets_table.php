<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleLogSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_log_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('month_year');
            $table->string('vehicle_registration_number'); 
            $table->string('date')->nullable();
            $table->string('description');
            $table->string('fuel_cost');
            $table->string('fuel_litres');
            $table->string('maintenance_cost');
            $table->string('maintenance_invoice');
            $table->string('driver_signature')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_log_sheets');
    }
}
