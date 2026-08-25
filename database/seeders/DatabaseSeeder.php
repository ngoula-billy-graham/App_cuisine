<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Formation;
use App\Models\Product;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    // ... au début du fichier, les imports ...

public function run(): void
{
    // 1. Création du compte Admin (si pas déjà fait)
    \App\Models\User::create([
        'name' => 'Chef DAN',
        'email' => 'chef@chefdan.com',
        'password' => bcrypt('password123'),
    ]);

    // 2. Création des formations avec les bons champs
    Formation::factory(6)->create([
        'status' => 'disponible', // On met le statut par défaut
        'places_available' => 10, // On définit un nombre de places par défaut
    ]);

    // 3. Reste des seeders (Produits, Posts)
    Product::factory(8)->create();
    Post::factory(8)->create();
}
}