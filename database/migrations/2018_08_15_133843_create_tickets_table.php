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
            $table->unsignedInteger('created_by');
            $table->foreign('created_by')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->string('position_name')->nullable();
            $table->string('location')->nullable();
            $table->decimal('position_grade',11,0)->nullable();
            $table->unsignedInteger('user_hrbp');
            $table->foreign('user_hrbp')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('approval_hrbp',['0','1','2'])->default(0);
            $table->text('reason_reject_hrbp')->nullable();

            $table->unsignedInteger('user_GH')->nullable();
            $table->foreign('user_GH')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('approval_GH',['0','1','2'])->default(0);
            $table->text('reason_reject_GH')->nullable();

            $table->unsignedInteger('user_GH_HR')->nullable();
            $table->foreign('user_GH_HR')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('approval_GH_HR',['0','1','2'])->default(0);
            $table->text('reason_reject_GH_HR')->nullable();

            $table->unsignedInteger('user_chief')->nullable();
            $table->foreign('user_chief')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('approval_chief',['0','1','2'])->default(0);
            $table->text('reason_reject_chief')->nullable();

            $table->unsignedInteger('user_chro')->nullable();
            $table->foreign('user_chro')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->enum('approval_chro',['0','1','2'])->default(0);
            $table->text('reason_reject_chro')->nullable();

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
