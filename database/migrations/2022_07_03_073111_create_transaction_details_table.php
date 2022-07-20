<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id');
            $table->foreignId('topup_id');
            $table->foreignId('payment_type_id');
            $table->enum('status', ["Waiting for Payment", "In Progress", "Completed", "Rejected", "Cancelled"]);
            $table->integer('price');
            $table->timestamp('due_date');
            $table->string('image_path')->nullable();
            $table->string('input_name');
            $table->timestamps();

            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('topup_id')->references('id')->on('topups');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_details');
    }
}
