<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration{

    public function up(){
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        //creando usuarios
        \DB::table('users')->insert([
            ['name'=>'Sebastián Jiménez','email'=>'juansebas257@gmail.com','password'=>\Hash::make('Passw0rdStian')],
            ['name'=>'Nayibi Silva','email'=>'nayiby.silva@gmail.com','password'=>\Hash::make('1204')]
        ]);
    }

    public function down(){
        Schema::dropIfExists('users');
    }
}