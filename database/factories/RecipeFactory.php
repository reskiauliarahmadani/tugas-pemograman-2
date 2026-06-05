<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecipeFactory extends Factory
{
    public function definition(): array
    {
        $recipes = [
            ['Nasi Goreng Spesial', 'Makanan Berat'],
            ['Ayam Bakar Madu', 'Makanan Berat'],
            ['Mie Goreng Jawa', 'Makanan Berat'],
            ['Pisang Goreng Crispy', 'Camilan'],
            ['Es Teh Manis', 'Minuman'],
            ['Klepon', 'Dessert'],
            ['Soto Ayam', 'Makanan Berat'],
            ['Tempe Mendoan', 'Camilan'],
        ];

        $pick = $this->faker->randomElement($recipes);

        return [
            'name'         => $pick[0],
            'ingredients'  => $this->faker->paragraph(2),
            'instructions' => $this->faker->paragraph(3),
            'duration'     => $this->faker->numberBetween(10, 120),
            'difficulty'   => $this->faker->randomElement(['Mudah', 'Sedang', 'Sulit']),
            'servings'     => $this->faker->numberBetween(1, 10),
            'category'     => $pick[1],
        ];
    }
}