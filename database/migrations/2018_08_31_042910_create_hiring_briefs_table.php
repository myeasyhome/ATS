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
            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->enum('approval_hiring_by_hrbp',['0','1','2'])->nullable();
            $table->text('reason_reject')->nullable();
            $table->date('date_schedule')->nullable();
            $table->time('time_schedule')->nullable();
            $table->string('place_schedule')->nullable();
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
