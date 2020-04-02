<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Content Types:
        // - plain_text_db  :: Plain text without HTML stored in the database.
        // - plain_html_db  :: Plain HTML stored in the databse.
        // - markdown_file  :: Markdown file stored in the filesystem.
        // - video          :: Video file stored in the filesystem.
        // - quizz          :: Quizz stored in the database.
        // - test           :: Just like a quizz but then it must be than a higher score.

        Schema::create('course_sections', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('title');
            $table->string('content_type');
            $table->text('content')->nullable();
            $table->boolean('draft')->default(true);
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }
}
