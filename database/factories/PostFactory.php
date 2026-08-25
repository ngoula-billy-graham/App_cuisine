<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
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
            'Carré d\'Agneau Rôti',
            'Entremets Chocolat Passion',
            'Mariage Élégant & Gastronomique',
            'Poulet DG revisité',
            'Atelier Pâtisserie du Weekend',
            'Macarons Assortis Maison',
            'Risotto aux Champignons Sauvages',
            'Fusion Africaine & Européenne'
        ]),
        'slug' => fake()->slug(),
        'category' => fake()->randomElement(['Plats', 'Pâtisseries', 'Événements', 'Cuisine Africaine', 'Formations']),
        'content' => fake()->paragraphs(3, true),
        'image_url' => null,
        'views' => fake()->numberBetween(100, 5000),
        'likes' => fake()->numberBetween(10, 800),
        'published_at' => fake()->dateTimeBetween('-1 month', 'now'),
    ];
}
}
