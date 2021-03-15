<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeQuestionInExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_in_exam', function (Blueprint $table) {
            $table->unsignedBigInteger('exam_id')->change();
            $table->foreign('exam_id')->references('exam_id')->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('question_in_exam', function (Blueprint $table) {
            //
        });
    }
}
