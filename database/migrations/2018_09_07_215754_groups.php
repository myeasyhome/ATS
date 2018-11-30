<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Groups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('directorates_id');
            $table->foreign('directorates_id')->references('id')->on('directorates')->onDelete('cascade');
            $table->string('group_name')->nullable();
        });

        Schema::table('ticket_erf_details', function(Blueprint $table) {
            $table->unsignedInteger('group')->after('directorate');
            $table->foreign('group')->references('id')->on('groups')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}