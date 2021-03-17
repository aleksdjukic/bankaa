<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image')->nullable();
            $table->string('title_en')->nullable();
            $table->string('title_sr')->nullable();
            $table->text('content_en')->nullable();
            $table->text('content_sr')->nullable();
            $table->string('slug_en')->nullable();
            $table->string('slug_sr')->nullable();
            $table->string('link')->nullable();
            $table->boolean('visibility')->default('1');
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
        Schema::dropIfExists('news');
    }
}
