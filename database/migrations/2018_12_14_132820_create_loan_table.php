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
            $table->float('amount');
            $table->float('interest_rate')->default(0);
            $table->DateTime('time');
            $table->float('payback')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('asset_id')->unique()->unsigned();


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
