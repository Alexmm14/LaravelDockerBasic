<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->text('post_contenido');
        $table->string('post_imagen');
        $table->date('fechaPublicacion');
        $table->boolean('estatus');
        $table->unsignedBigInteger('categoria_id'); // Columnas donde se van a registrar el valor de la llave foranea
        $table->unsignedBigInteger('label_id'); // Columnas donde se van a registrar el valor de la llave foranea
        $table->foreign('categoria_id')->references('id')->on('categorias'); //Referencia de las llaver primarias de las tablas
        $table->foreign('label_id')->references('id')->on('labels'); //Referencia de las llaver primarias de las tablas
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
        Schema::dropIfExists('_post');
    }
}
