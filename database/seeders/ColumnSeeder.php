<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ColumnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('columns')->insert([
            ['title' => 'À faire', 'position' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'En cours', 'position' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Terminé', 'position' => 3, 'created_at' => now(), 'updated_at' => now()],
        ]);    }
}
