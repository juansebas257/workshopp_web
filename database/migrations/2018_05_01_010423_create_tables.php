<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTables extends Migration{

    public function up(){
        Schema::create('knowledge_areas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
        });
        \DB::table('knowledge_areas')->insert([
                ['name'=>'Agronomía, veterinarias y afines'],
                ['name'=>'Bellas Artes'],
                ['name'=>'Ciencias de la Educación'],
                ['name'=>'Ciencias de la Salud'],
                ['name'=>'Ciencias Sociales y Humanas'],
                ['name'=>'Economía, Administración, Contaduría y afines'],
                ['name'=>'Ingeniería, Arquitectura, Urbanismo y afines'],
                ['name'=>'Matemáticas y Ciencias Naturales'],
            ]
        );

        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('area')->unsigned();
            $table->foreign('area')->references('id')->on('knowledge_areas');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course')->unsigned();
            $table->foreign('course')->references('id')->on('courses');
            $table->integer('user')->unsigned();
            $table->foreign('user')->references('id')->on('users');
            $table->string('description');
            $table->decimal('calification',10,2)->nullable();
            $table->integer('type');//1.taller, 2.examen
            $table->string('file');
            $table->string('teacher')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('documents');
        Schema::dropIfExists('courses');
        Schema::dropIfExists('knowledge_areas');
    }
}
