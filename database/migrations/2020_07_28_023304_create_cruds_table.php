<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCrudsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome', 100);
            $table->string('cep', 8);
            $table->string('logradouro', 150);
            $table->string('complemento', 100);
            $table->string('numero', 6);
            $table->string('bairro', 100);
            $table->string('uf', 2);
            $table->string('cidade', 100);
            $table->date('data');
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
        Schema::dropIfExists('place');
    }
}
