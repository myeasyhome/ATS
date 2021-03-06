<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCVsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CV', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hiring_brief_id');
            $table->foreign('hiring_brief_id')->references('id')->on('hiring_briefs')->onDelete('cascade');
            $table->string('approval_candidate')->nullable();
            $table->date('approval_date_candidate')->nullable();
            $table->date('date_nextProcess_hrta')->nullable();
            $table->text('reason_reject')->nullable();
            $table->enum('gender',['M','F']);
            $table->string('place_birth');
            $table->date('date_birth');
            $table->string('name_candidate');
            $table->string('education');
            $table->string('CV_candidate');
            $table->string('current_position');
            $table->string('current_company');
            $table->string('current_industry');
            $table->string('work_exp');
            $table->string('source');
            $table->string('skill');
            $table->text('tags');
            $table->string('email');
            $table->string('other')->nullable();
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
        Schema::dropIfExists('CV');
    }
}
