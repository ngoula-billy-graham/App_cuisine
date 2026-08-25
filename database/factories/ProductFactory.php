<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'name' => fake()->randomElement([
            'Gâteau Royal Chocolat',
            'Tarte Fruits Rouges',
            'Assortiment Chocolats Prestige',
            'Macarons Assortis',
            'Éclairs au Café',
            'Mille-feuille Vanille',
            'Pain d\'Épices Maison',
            'Cake aux Agrumes'
        ]),
        'description' => fake()->sentence(10),
        'category' => fake()->randomElement(['Pâtisseries', 'Chocolats', 'Spécialités']),
        'price' => fake()->randomFloat(2, 15, 80),
        'image_url' => null, // On laisse vide pour l'instant, les icônes s'afficheront
        'stock' => fake()->numberBetween(5, 50),
    ];
}
}
