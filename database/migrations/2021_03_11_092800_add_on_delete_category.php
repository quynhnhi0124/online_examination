<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOnDeleteCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_category', function (Blueprint $table) {
            $table->dropForeign('subject_category_subject_id_foreign');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_category', function (Blueprint $table) {
            //
        });
    }
}
