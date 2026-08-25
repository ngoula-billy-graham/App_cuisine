<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::all(); // ou paginate(8) si vous voulez une pagination
    return view('boutique', compact('products'));
}

public function create() {
    return view('admin.products.create');
}

public function store(Request $request) {
    // validation et création...
    return redirect()->route('products.index')->with('success', 'Produit ajouté !');
}

public function edit(Product $product) {
    return view('admin.products.edit', compact('product'));
}

public function update(Request $request, Product $product) {
    // validation et mise à jour...
    return redirect()->route('products.index')->with('success', 'Produit modifié !');
}

}
