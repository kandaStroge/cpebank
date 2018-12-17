<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->float('amount')->nullable();
            $table->float('interest_rate')->default(0)->nullable();
            $table->DateTime('time')->nullable();
            $table->float('payback')->default(0)->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('asset_id')->unique()->unsigned()->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loan');
    }
}
