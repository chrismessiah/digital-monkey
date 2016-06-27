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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('pic_name')->nullable();
            $table->boolean('is_admin')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        $this->insert_stuff();
    }

    private function insert_stuff() {
        DB::statement("INSERT INTO users (id, username, email, firstname, lastname, pic_name, is_admin, password)
        VALUES
        	(2345,'admin','admin@admin.com', 'admin', 'admin',NULL,TRUE,'admin'),
        	(34561,'chrabd','chrabd@kth.com', 'Christian','Abdel',NULL,FALSE,'123456');
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
