<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sections', function (Blueprint $table) {
            $table->id();

            $table->string('slug');
            $table->string('title');
            $table->string('content_type')->nullable();
            $table->text('content')->nullable();
            $table->boolean('draft')->default(true);
            $table->boolean('status')->default(false);

            $table->timestamps();
        });
    }
}
