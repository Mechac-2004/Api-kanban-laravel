<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Columns;

class ColumnSeeder extends Seeder
{
    public function run()
    {
        Columns::factory()->count(5)->create(); 
    }
}
