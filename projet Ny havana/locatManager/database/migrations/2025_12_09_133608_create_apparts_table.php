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
        Schema::create('apparts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_batiment')->constrained('batiments');
            $table->integer('etage');
            $table->string('logement')->unique();
            $table->integer('loyer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apparts');
    }
};
