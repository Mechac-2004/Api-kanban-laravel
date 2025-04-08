<?php

namespace Database\Factories;

use App\Models\Columns;
use Illuminate\Database\Eloquent\Factories\Factory;

class ColumnsFactory extends Factory
{
    protected $model = Columns::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            // Ajoutez ici les autres champs fillable de votre modèle
        ];
    }
}