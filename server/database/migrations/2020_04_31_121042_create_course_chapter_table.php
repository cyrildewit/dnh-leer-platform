<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseChapterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_chapter', function (Blueprint $table) {
            $table->id();

            $table->integer('course_id')->unsigned()->index();
            $table->integer('chapter_id')->unsigned()->index();

            $table->timestamps();
        });
    }
}
