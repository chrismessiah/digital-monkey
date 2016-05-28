<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('blogposts');
        Schema::create('blogposts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author')->unsigned();
            $table->foreign('author')->references('id')->on('users');
            $table->string('image_path', 70);
            $table->string('title', 50);
            $table->string('intro', 200);
            $table->text('body');
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
        //
    }
}
