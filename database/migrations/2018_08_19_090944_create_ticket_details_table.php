<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_jd_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onUpdate('cascade')->onDelete('cascade');
            $table->string('supervisor')->nullable();
            $table->string('incumbent_name')->nullable();
            $table->string('supervisor_name')->nullable();
            $table->text('role_purpose')->nullable();
            $table->string('direct_sub')->nullable();
            $table->string('indirect_sub')->nullable();
            // $table->text('internal_within')->nullable();
            // $table->text('internal_outside')->nullable();
            // $table->text('external')->nullable();
            $table->string('job_level')->nullable();
            $table->string('min_education')->nullable();
            $table->text('qualification')->nullable();
            // $table->text('scope_area')->nullable();
            // $table->text('scope_activities')->nullable();
            $table->text('responsibility')->nullable();
            $table->text('soft_competency')->nullable();
            $table->text('hard_index')->nullable();
            $table->text('hard_value')->nullable();
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
        Schema::dropIfExists('ticket_jd_details');
    }
}
