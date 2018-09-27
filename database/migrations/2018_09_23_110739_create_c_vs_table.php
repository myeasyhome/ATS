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
            $table->enum('gender',['M','F']);
            $table->string('place_birth');
            $table->date('date_birth');
            $table->string('name_candidate');
            $table->string('education');
            $table->string('CV_candidate');
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
