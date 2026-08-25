<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;


class PostController extends Controller
{

    // ... vos autres méthodes existantes ...

public function loadMore(Request $request)
{
    $page = $request->get('page', 1);
    $posts = Post::orderBy('created_at', 'desc')->paginate(6, ['*'], 'page', $page);

    if ($request->ajax()) {
        return view('partials.feed-cards', compact('posts'))->render();
    }

    return redirect()->route('feed');
}
    public function index()
{
    $posts = Post::orderBy('created_at', 'desc')->paginate(6);
    return view('feed', compact('posts'));
}

    public function like(Post $post)
{
    $post->increment('likes');
    return response()->json(['likes' => $post->likes]);
}

}