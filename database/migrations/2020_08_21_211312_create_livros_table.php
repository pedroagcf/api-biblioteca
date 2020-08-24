<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLivrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('livros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->integer('anoLancamento');
            $table->foreignId('autor_id')->nullable()->references('id')->on('autors')->onDelete('cascade');
            $table->foreignId('editora_id')->nullable()->references('id')->on('editoras')->onDelete('cascade');
            $table->foreignId('genero_id')->nullable()->references('id')->on('generos_literarios')->onDelete('cascade');
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
        Schema::dropIfExists('livros');
    }
}
