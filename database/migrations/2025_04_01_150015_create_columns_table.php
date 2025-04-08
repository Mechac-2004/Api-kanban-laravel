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
        Schema::create('columns', function (Blueprint $table) {
            $table->id('column_id');
            $table->string('title')->unique();
            $table->timestamps();
        });

        // Colonnes par défaut
        DB::table('columns')->insert([
            ['title' => 'A faire', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'En cours', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Terminé', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

/**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};