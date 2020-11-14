<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id')->unique();
            $table->String('category');
            $table->longText('title');
            $table->longText('body');
            $table->integer('likes');
            $table->longText('img_url');
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
            $table->string('slug', 85)->unique();
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
