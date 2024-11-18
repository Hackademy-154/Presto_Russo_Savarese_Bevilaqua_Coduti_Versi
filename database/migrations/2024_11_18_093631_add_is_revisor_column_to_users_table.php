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
        // Questa funzione booleana serve per far vedere se un utente ha il ruolo di revisore. falso: non è revisore, e di default è falso
        Schema::table('users', function (Blueprint $table) {
            $table->boolean('is_revisor')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('is_revisor');
        });
    }
};
