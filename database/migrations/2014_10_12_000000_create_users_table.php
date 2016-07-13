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
            $table->bigInteger('fb_id')->unique()->nullable();
            $table->string('email')->unique();
            $table->string('fullname');
            $table->boolean('is_admin')->default(false);
            $table->string('password')->nullable(); // for fb login
            $table->rememberToken();
            $table->timestamps();
        });
        $this->insert_stuff();
    }

    private function insert_stuff() {
        DB::statement("INSERT INTO users (id, email, fullname, is_admin, password, remember_token, updated_at)
        VALUES
        	(2345,'superuser@superuser.com', 'superuser superuser',TRUE,'\$2y\$10\$Ac9SitW1rA041PZTEw4SDu41zNhEk1MmdX9XDcWjx9WiITPmL269y', 'M5C9Q7H9zvsiynhLOZB3yO35tOpeI5FMduXGGEPZQ8oyPaOpulXT7jRtfpKx', '2016-07-11 10:28:30'),
        	(34561,'chrabd@kth.se', 'Christian Abdel',FALSE,'\$2y\$10\$N1KnUXUUmg0HDWGv4i0voO35vYbwTrEFIWQQEmpP0zhEcNjzBfvPu', 'II7v3XSKWQlCATSfveyqaaKA0PXId5PvCxHJOnPNeU0nDYCz0O6ZYugHubCX', '2016-07-11 11:30:50');
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
