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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('locataire_id')->constrained('locataires');
            $table->foreignId('appart_id')->constrained('apparts');
            $table->integer('amount');
            $table->date('payment_date');
            $table->string('payment_method');
            $table->string('month'); // ex: 2026-01
            $table->string('year');
            $table->string('status'); // payé / non payé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
