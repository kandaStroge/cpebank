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
            $table->string('frname', 45);
            $table->string('lname', 45);
            $table->date('dob')->nullable();
            $table->enum('gender', ['man', 'woman']);
            $table->string('phone', 10);
            $table->text('home_addr');
            $table->text('work_addr');
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
