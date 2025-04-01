<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            ['title' => 'Configurer Laravel', 'description' => 'Installer Laravel et configurer l’environnement', 'user_id' => 1, 'column_id' => 1, 'position' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Créer la base de données', 'description' => 'Définir les migrations et exécuter php artisan migrate', 'user_id' => 1, 'column_id' => 1, 'position' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Développer le backend', 'description' => 'Implémenter les API Laravel', 'user_id' => 1, 'column_id' => 2, 'position' => 1, 'created_at' => now(), 'updated_at' => now()],
        ]);    }
}
