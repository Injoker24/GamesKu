<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('history_id');
            $table->foreignId('transaction_detail_id');
            $table->timestamps();

            $table->foreign('history_id')->references('id')->on('histories');
            $table->foreign('transaction_detail_id')->references('id')->on('transaction_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_details');
    }
}
