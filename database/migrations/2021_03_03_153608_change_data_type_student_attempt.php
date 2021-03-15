<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDataTypeStudentAttempt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_attempt', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->change();
            $table->unsignedBigInteger('exam_id')->change();
            $table->foreign('student_id')->references('id')->on('users');
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
        Schema::table('student_attempt', function (Blueprint $table) {
            //
        });
    }
}
