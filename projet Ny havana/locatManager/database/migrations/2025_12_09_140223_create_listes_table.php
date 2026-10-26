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
        Schema::create('listes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_locataire')->constrained('locataires');
            $table->foreignId('id_batiment')->constrained('batiments');
            $table->foreignId('id_appart')->constrained('apparts')->unique();
            $table->string('adresse');
            $table->string('ville');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listes');
    }
};
