<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->id();

            $table->string('display_name')->nullable();
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('status')->default('draft');

            $table->timestamps();
        });
    }
}
