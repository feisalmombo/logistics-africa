<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approveds', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('procurement_requests_id')->unsigned();
            $table->string('approved_status'); // status - approved by project manager
            $table->string('manager_signature_attachments')->nullable();
            $table->string('other_attachments')->nullable();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('procurement_requests_id')
            ->references('id')->on('procurement_requests')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')->on('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('approveds');
    }
}
