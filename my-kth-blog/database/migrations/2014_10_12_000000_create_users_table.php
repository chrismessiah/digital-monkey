<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::dropIfExists('users');
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('pic_name');
            $table->boolean('is_admin');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        $this->insert_stuff();
    }

    private function insert_stuff() {
        DB::statement("INSERT INTO users (id, username, firstname, lastname, pic_name, is_admin, email, password)
        VALUES
        	(2345,'admin','admin','admin','example.jpg',TRUE, 'admin@admin.com','admin'),
        	(34561,'chrabd','Christian','Abdel','example.jpg',FALSE,'ab@gmail.com','123456');
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
