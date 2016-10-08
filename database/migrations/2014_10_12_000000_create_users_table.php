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
            $table->bigInteger('fb_id')->unique()->nullable(); // for email-login
            $table->string('email')->unique();
            $table->string('fullname');
            $table->boolean('is_admin')->default(false);
            $table->string('password')->nullable(); // for fb login
            $table->string('about')->default('I like Turtles!');
            $table->rememberToken();
            $table->timestamps();
        });
        $this->insert_stuff();
    }

    private function insert_stuff() {
        $users = array(
            array(
                'email' => 'superuser@superuser.com',
                'fullname' => 'superuser superuser',
                'is_admin' => TRUE,
                'about' => 'Copywriter who covers design news. Find out more about him at www.website.com',
                'password' => '$2y$10$Ac9SitW1rA041PZTEw4SDu41zNhEk1MmdX9XDcWjx9WiITPmL269y',
                'remember_token' => 'M5C9Q7H9zvsiynhLOZB3yO35tOpeI5FMduXGGEPZQ8oyPaOpulXT7jRtfpKx'
            ), array(
                'email' => 'chrabd@kth.se',
                'fullname' => 'Christian Abdel',
                'is_admin' => FALSE,
                'about' => 'Copywriter who covers design news. Find out more about him at www.website.com',
                'password' => '$2y$10$N1KnUXUUmg0HDWGv4i0voO35vYbwTrEFIWQQEmpP0zhEcNjzBfvPu',
                'remember_token' => 'II7v3XSKWQlCATSfveyqaaKA0PXId5PvCxHJOnPNeU0nDYCz0O6ZYugHubCX'
            )); 
        foreach ($users as $array) {
            $row = new App\User;
            $row->email = $array['email'];
            $row->fullname = $array['fullname'];
            $row->is_admin = $array['is_admin'];
            $row->about = $array['about'];
            $row->password = $array['password'];
            $row->remember_token = $array['remember_token'];
            $row->save();
        }
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
