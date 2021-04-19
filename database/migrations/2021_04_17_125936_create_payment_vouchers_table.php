<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_vouchers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('project_id')->unsigned();
            $table->string('country_office');
            $table->string('date')->nullable();
            $table->string('beneficiary_name')->nullable();
            $table->string('beneficiary_address')->nullable();
            $table->string('cash_payment');
            $table->string('amount_words');
            $table->string('cheque_number');
            $table->string('bank_name');
            $table->string('quantity')->nullable();
            $table->string('description');
            $table->string('rate');
            $table->string('profoma_invoice_amount');
            $table->integer('user_id')->unsigned();
            $table->string('signature_attachments')->nullable();
            $table->string('approved_status')->nullable();
            $table->string('payee_signature')->nullable();
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
        Schema::dropIfExists('payment_vouchers');
    }
}
