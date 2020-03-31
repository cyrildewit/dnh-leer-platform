<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();

            // Course content
            $table->string('title')->nullable();
            $table->string('headline')->nullable();
            $table->text('description')->nullable();
            $table->text('description_excerpt')->nullable();
            $table->json('learning_points')->nullable();
            $table->json('target_audience')->nullable();

            // Course meta
            $table->string('level')->nullable();
            $table->date('published_at')->nullable();

            $table->timestamps();
        });
    }
}
