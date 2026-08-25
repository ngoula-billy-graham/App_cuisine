<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormationController;
use App\Http\Controllers\FormationRegistrationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\FormationController as AdminFormationController;
use App\Http\Controllers\Admin\FormationRegistrationController as AdminFormationRegistrationController;
use App\Http\Controllers\Admin\InquiryController as AdminInquiryController;

/*
|--------------------------------------------------------------------------
| Routes Publiques (Accessibles à tous)
|--------------------------------------------------------------------------
*/

// Page d'accueil
Route::view('/', 'home')->name('home');

// Pages statiques
Route::view('/chef', 'chef')->name('chef');
Route::view('/prestations', 'prestations')->name('prestations');
Route::view('/galerie', 'galerie')->name('galerie');
Route::view('/contact', 'contact')->name('contact');

// Pages qui affichent des données depuis la base de données
Route::get('/formations', [FormationController::class, 'index'])->name('formations');
Route::get('/boutique', [ProductController::class, 'index'])->name('boutique');
Route::get('/feed', [PostController::class, 'index'])->name('feed');
Route::post('/formation-register', [FormationRegistrationController::class, 'store'])->name('formation.register');

// Envoi du formulaire de contact (POST)
Route::post('/contact', [InquiryController::class, 'store'])->name('contact.store');


/*
|--------------------------------------------------------------------------
| Route pour le Dashboard (Redirection vers l'admin)
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->name('dashboard')->middleware(['auth']);

// Route pour les Likes
Route::post('/posts/{post}/like', [App\Http\Controllers\PostController::class, 'like'])->name('posts.like');

Route::get('/feed/load-more', [App\Http\Controllers\PostController::class, 'loadMore'])->name('feed.load-more');

Route::post('/order', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');
/*
|--------------------------------------------------------------------------
| Routes Admin (Protégées par mot de passe)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    
    // Tableau de bord Administrateur
    Route::view('/admin/dashboard', 'admin.dashboard')->name('admin.dashboard');

    // GESTION DE LA BOUTIQUE (Ajouter, Modifier, Supprimer des produits)
    Route::resource('/admin/products', AdminProductController::class);
    
    // ➡️ Feed / Publications
    Route::resource('/admin/posts', AdminPostController::class);
     // Gestion des commandes
    Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');

    Route::resource('/admin/formations', AdminFormationController::class);
    Route::resource('/admin/registrations', AdminFormationRegistrationController::class);

    // ... à l'intérieur du groupe auth ...
    Route::resource('/admin/inquiries', AdminInquiryController::class);
    
});


/*
|--------------------------------------------------------------------------
| Routes d'Authentification (Créées par Laravel Breeze)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';