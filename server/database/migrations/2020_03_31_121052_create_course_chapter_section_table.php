<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseChapterSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_chapter_section', function (Blueprint $table) {
            $table->id();
            $table->integer('chapter_id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->timestamps();
        });
    }
}
