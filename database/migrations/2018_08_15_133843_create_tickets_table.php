<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('position_name')->nullable();
            $table->string('location')->nullable();
            $table->decimal('position_grade',11,0)->nullable();
            $table->enum('approval_lm2',['0','1','2'])->default(0);
            $table->enum('approval_hrbp',['0','1','2'])->default(0);
            $table->text('reason_reject_lm2')->nullable();
            $table->text('reason_reject_hrbp')->nullable();
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
        Schema::dropIfExists('tickets');
    }
}
