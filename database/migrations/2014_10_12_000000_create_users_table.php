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
            $table->increments('id');
            $table->string('nik')->unique();
            $table->string('password');
            $table->string('name');
            $table->integer('grade')->nullable();
            $table->string('email')->nullable();
            $table->string('position_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('directorate')->nullable();
            $table->string('chief')->nullable();
            $table->string('group')->nullable();
            $table->string('division')->nullable();
            $table->string('gender')->nullable();
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
