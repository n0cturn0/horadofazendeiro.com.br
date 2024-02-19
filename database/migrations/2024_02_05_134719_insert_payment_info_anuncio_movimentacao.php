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
        Schema::table('anunciomoviento', function (Blueprint $table) {
            $table->string('payment_status');
            $table->string('payment_status_detail');
            $table->integer('payment_id');
            $table->string('payment_ticket_url');
            $table->string('payment_qrcode');
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
