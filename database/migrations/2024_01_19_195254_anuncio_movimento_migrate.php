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
        Schema::create('anunciomoviento', function (Blueprint $table) {
            $table->id();         
            $table->integer('idanuncio');
            $table->integer('idusuario');
            $table->integer('pacote'); 
            $table->date('datacriacao');
            $table->date('datavencimento'); 
            $table->integer('status'); 
            $table->date('datapagamento');
            $table->string('informacao');
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
