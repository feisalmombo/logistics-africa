<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintenanceMonitoringAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintenance_monitoring_assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('asset_id'); 
            $table->string('description_asset');
            $table->string('state_use');
            $table->string('cost_centre');
            $table->string('location');
            $table->string('summary_ordinary_maintenance');
            $table->string('summary_extraordinary_maintenance');
            $table->string('cost');
            $table->string('supplier_service');
            $table->string('supplier_invoice');
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
        Schema::dropIfExists('maintenance_monitoring_assets');
    }
}
