<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('fname', 45);
            $table->string('lname', 45);
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->string('phone', 10)->nullable();
            $table->text('home_addr')->nullable();
            $table->text('work_addr')->nullable();
            $table->string('email',60)->unique();
            $table->string('password',60);
            $table->string('token',60)->default(null)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
