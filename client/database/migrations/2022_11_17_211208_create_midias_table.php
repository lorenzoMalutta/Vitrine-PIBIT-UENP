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
    Schema::create('midias', function (Blueprint $table) {
      $table->id();
      $table->timestamps();
      $table->string('image')->nullable(true);
      $table->string('video')->nullable(true);
      $table->string('pdf')->nullable(true);

      $table->unsignedBigInteger('idPatente')->unique()->nullable(true);
      $table->foreign('idPatente')->references('id')->on('patentes')->onDelete('cascade')->nullable(true);
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('midias', function (Blueprint $table) {
      $table->foreign('idPatente')->constrained()->onDelete('cascade');
    });
    Schema::dropIfExists('midias');
  }
};
