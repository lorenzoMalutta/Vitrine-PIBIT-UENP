<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicos', function (Blueprint $table) {
          $table->id()->unique();
          $table->timestamps();
          $table->string('nome');
          $table->longText('sinopse');
          $table->longText('resumo');
          $table->longText('problema');
          $table->longText('aplicacao');
          $table->bigInteger('telefone');
          $table->string('email');
          $table->string('links')->nullable(true);
          $table->string('criadores');
          $table->string('palavra_chave');
          $table->string('area_cientifica');
          $table->string('area_economica');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('servicos');
    }
};
