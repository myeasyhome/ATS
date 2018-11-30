<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('cv_id');
            $table->foreign('cv_id')->references('id')->on('CV')->onDelete('cascade');
            $table->dateTime('interview_finish')->nullable();
            $table->string('interview_title');
            $table->string('interview_user');
            // $table->unsignedInteger('interview_user');
            // $table->foreign('interview_user')->references('id')->on('users')->onDelete('cascade');
            $table->date('interview_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('location');
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
        Schema::dropIfExists('interview');
    }
}
