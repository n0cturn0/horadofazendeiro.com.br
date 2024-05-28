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
        Schema::table('anuncio', function (Blueprint $table) {
            $table->string('animal')->nullable();
            $table->string('classificacao')->nullable();
            $table->string('tipogenetica')->nullable();
            $table->string('registro')->nullable();
            $table->date('datanascimento')->nullable();
            $table->string('iabcz')->nullable();
            $table->string('peso')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('anuncio', function (Blueprint $table) {
            $table->dropColumn('animal');
            $table->dropColumn('classificacao');
            $table->dropColumn('tipogenetica');
            $table->dropColumn('registro');
            $table->dropColumn('datanascimento');
            $table->dropColumn('iabcz');
            $table->dropColumn('peso');
        });
    }
};
