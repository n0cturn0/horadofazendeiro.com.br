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
        Schema::create('pagamentoendereco', function (Blueprint $table) {
            $table->id();         
            $table->integer('idpagamento');
            $table->string('estado');
            $table->string('cidade');
            $table->string('bairro');
            $table->string('cep');
            $table->string('numero');
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
