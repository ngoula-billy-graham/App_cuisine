<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'content' => 'required|string',
    ]);

    // 1. Générer le slug à partir du titre
    $slug = Str::slug($request->title);

    // 2. Vérifier si un post avec ce slug existe déjà
    if (Post::where('slug', $slug)->exists()) {
        // Si oui, on renvoie vers le formulaire avec un message d'erreur clair
        return redirect()->back()
            ->withErrors(['title' => 'Une publication avec ce titre existe déjà. Veuillez en choisir un autre.'])
            ->withInput(); // Garde les données saisies pour ne pas tout réécrire
    }

    // 3. Si tout est bon, on crée la publication
    Post::create([
        'title' => $request->title,
        'slug' => $slug,
        'category' => $request->category,
        'content' => $request->content,
        'published_at' => now(),
    ]);

    return redirect()->route('posts.index')->with('success', 'Publication créée avec succès !');
}
    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'content' => 'required|string',
    ]);

    // 1. Générer le nouveau slug
    $slug = Str::slug($request->title);

    // 2. Vérifier si un AUTRE post (avec un id différent) utilise déjà ce slug
    if (Post::where('slug', $slug)->where('id', '!=', $post->id)->exists()) {
        return redirect()->back()
            ->withErrors(['title' => 'Une autre publication porte déjà ce titre. Veuillez en choisir un autre.'])
            ->withInput();
    }

    // 3. Mise à jour
    $post->update([
        'title' => $request->title,
        'slug' => $slug,
        'category' => $request->category,
        'content' => $request->content,
    ]);

    return redirect()->route('posts.index')->with('success', 'Publication modifiée avec succès !');
}

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Publication supprimée !');
    }
}