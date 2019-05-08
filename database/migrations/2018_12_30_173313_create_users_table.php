<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id_user');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('nickname')->unique();
            $table->integer('phone_number')->unique();
            $table->integer('status');
            $table->char('adress');
            $table->string('password');
            $table->unsignedInteger('tridas');
            $table->foreign('tridas')->references('id_tridy')->on('tridas');
            $table->integer('kabinet');
            $table->string('barva');
            $table->rememberToken();
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
