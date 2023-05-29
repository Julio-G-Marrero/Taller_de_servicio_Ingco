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
        Schema::create('centro_de_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('direccion');
            $table->string('correo');
            $table->integer('tel');
            $table->string('ciudad');
            $table->string('estado');
            $table->foreignId('zona_id')->constrained()->onDelete('cascade')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('centro_de_servicios');
    }
};
