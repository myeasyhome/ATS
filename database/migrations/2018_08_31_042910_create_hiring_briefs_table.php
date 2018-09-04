<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHiringBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hiring_briefs', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date_schedule');
            $table->time('time_schedule');
            $table->string('interviewer_user')->nullable();
            $table->string('interviewer_hrbp')->nullable();
            $table->text('job_function')->nullable();
            $table->text('general_information')->nullable();
            $table->text('characteristic')->nullable();
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
        Schema::dropIfExists('hiring_briefs');
    }
}
