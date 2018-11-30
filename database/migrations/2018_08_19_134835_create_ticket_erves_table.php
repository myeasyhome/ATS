<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketErvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_erf_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets')->onUpdate('cascade')->onDelete('cascade');
            $table->string('reporting_to')->nullable();
            // $table->unsignedInteger('directorate');
            // $table->unsignedInteger('group');
            // $table->unsignedInteger('division');
            // $table->unsignedInteger('department');

            $table->string('headcount_type')->nullable();
            $table->string('employee_status')->nullable();
            $table->string('contract_duration')->nullable();

            $table->string('type_hiring')->nullable();
            $table->string('confidentiality')->nullable();
            $table->string('request_background')->nullable();
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('ticket_erf_details');
    }
}
