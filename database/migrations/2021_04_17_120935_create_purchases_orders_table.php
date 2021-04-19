<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('date')->nullable();
            $table->string('to');
            $table->string('reference_number');
            $table->string('code')->nullable();
            $table->string('decription_items');
            $table->string('quantity');
            $table->string('unit_price');
            $table->string('amount');
            $table->string('invoice_to')->nullable();
            $table->string('tin_number')->nullable();
            $table->string('invoice_address')->nullable();
            $table->integer('project_id')->unsigned();
            $table->string('delivery_date');
            $table->string('delivery_address');
            $table->string('terms_delivery');
            $table->string('terms_payment');
            $table->integer('user_id')->unsigned();
            $table->string('signature_attachments')->nullable();
            $table->string('status')->nullable();
            $table->string('other_attachments')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
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
        Schema::dropIfExists('purchases_orders');
    }
}
