<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentAttemptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_attempt', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_student');
            $table->bigInteger('id_exam');
            $table->datetime('start_time');
            $table->datetime('finish_time');
            $table->float('score');
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
        Schema::dropIfExists('student_attempt');
    }
}
