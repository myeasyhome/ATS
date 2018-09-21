<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sourcings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('hiring_brief_id');
            $table->foreign('hiring_brief_id')->references('id')->on('hiring_briefs')->onDelete('cascade');
            $table->string('nama');
            $table->string('ttl');
            $table->text('alamat');
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
        Schema::dropIfExists('sourcings');
    }
}
