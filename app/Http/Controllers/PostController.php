<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function detail($slug){
        $post = Post::where('slug', $slug)->firstOrfail();
        return view('post.detail',['post' => $post]);
    }
    public function showArtikel()
    {
        $artikel = Post::where('published', 1)->latest()->get();
        return view('post.artikel', compact('artikel'));
    }

    public function penulis()
    {
    $post = Post::with('media')->latest()->first(); // Post terakhir
    return view('post.penulis', compact('post'));
    }
}