<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anuncio', function (Blueprint $table) {
            $table->id();         
            $table->string('titulo');
            $table->string('cidade');
            $table->string('estado');
            $table->date('datacriacao');
            $table->integer('precotipo'); //0-kg 1-unidade
            $table->string('preco');
            $table->string('anuncio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
