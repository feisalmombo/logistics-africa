<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProcurementRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procurement_requests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('request_number');
            $table->integer('project_id')->unsigned();
            $table->string('date_request');
            $table->integer('kind_procurement_id')->unsigned();
            $table->string('budget_line');
            $table->string('decription_items');
            $table->string('quantity');
            $table->integer('budget_expenditure_id')->unsigned();
            $table->string('delivery_within');
            $table->integer('user_id')->unsigned();
            $table->string('administrator_signature_attachments')->nullable();
            $table->string('checked_status'); // status - checked by project administrator
            $table->string('other_attachments')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
            $table->foreign('kind_procurement_id')->references('id')->on('kind_procurements')->onDelete('cascade');
            $table->foreign('budget_expenditure_id')->references('id')->on('budget_expenditures')->onDelete('cascade');
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
        Schema::dropIfExists('procurement_requests');
    }
}
