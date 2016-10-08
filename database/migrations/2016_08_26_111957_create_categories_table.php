<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('categories');
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 15)->unique();
            $table->timestamps();
        });
        $this->insert_stuff();
    }
    
    private function insert_stuff() {
        $categories = array(
        'web dev',
        'science',
        'math',
        'economics',
        'big data'
    );
        foreach ($categories as $category) {
            $row = new App\Category;
            $row->name = $category;
            $row->save();
        }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('categories');
    }
}
