<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil satu post terbaru sebagai featured
        $featured_post = Post::where('published', true)->latest()->first();

        // Ambil 5 post berikutnya (setelah featured)
        $post_list = Post::where('published', true)
            ->where('id', '!=', $featured_post->id)
            ->latest()
            ->skip(1)
            ->take(3)
            ->get();

        // Kirim ke blade
        return view('home.index', compact('featured_post', 'post_list'));
    }
}
