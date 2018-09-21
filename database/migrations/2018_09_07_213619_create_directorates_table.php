<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDirectoratesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directorates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('directorate_name')->nullable();
        });

        Schema::table('ticket_erf_details', function(Blueprint $table) {
            $table->unsignedInteger('directorate')->after('reporting_to');
            $table->foreign('directorate')->references('id')->on('directorates')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('directorates');
    }
}
