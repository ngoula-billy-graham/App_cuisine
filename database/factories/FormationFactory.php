<?php

namespace Database\Factories;

use App\Models\Formation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Formation>
 */
class FormationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'title' => fake()->randomElement([
            'Formation Cuisine Gastronomique',
            'Formation Pâtisserie Artisanale',
            'Cuisine Africaine & Fusion',
            'Ateliers Événementiels',
            'Techniques de Chef Professionnel',
            'Boulangerie Artisanale'
        ]),
        'description' => fake()->sentence(15),
        'start_date' => fake()->dateTimeBetween('+1 week', '+3 months'),
        'price' => fake()->randomFloat(2, 50, 500),
        'is_active' => true,
    ];
}
}
