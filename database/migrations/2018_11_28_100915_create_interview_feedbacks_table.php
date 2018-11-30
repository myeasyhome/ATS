<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_feedback', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('interview_id');
            $table->foreign('interview_id')->references('id')->on('interview')->onDelete('cascade');
            $table->unsignedInteger('feedback_by');
            $table->foreign('feedback_by')->references('id')->on('users')->onDelete('cascade');
            $table->enum('approve_feedback',['0','1'])->default(0);
            $table->text('comment_feedback')->nullable();
            $table->text('point_feedback');
            $table->text('technical_competencies')->nullable();
            $table->text('point_technical')->nullable();
            $table->string('total_point');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('interview_feedbacks');
    }
}
