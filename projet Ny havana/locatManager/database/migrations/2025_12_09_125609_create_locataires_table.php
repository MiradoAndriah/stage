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
        Schema::create('locataires', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('nom');
            $table->string('prenom')->nullable();
            $table->string('contact');
            $table->string('mail')->nullable();
            $table->string('cin')->nullable()->unique();
            $table->string('nif')->nullable()->unique(); // entreprise
            $table->string('stat')->nullable()->unique(); // entreprise
            $table->string('adresse')->nullable();
            $table->enum('statut', ['actif', 'inactif', 'blacklist'])->default('actif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locataires');
    }
};
