<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('groups_id');
            $table->foreign('groups_id')->references('id')->on('groups')->onDelete('cascade');
            $table->string('division_name');
        });

        Schema::table('ticket_erf_details', function(Blueprint $table) {
            $table->unsignedInteger('division')->after('group');
            $table->foreign('division')->references('id')->on('divisions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
}
