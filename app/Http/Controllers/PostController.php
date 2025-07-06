<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
    // Ambil kategori dengan slug 'artikel'
    $artikelCategory = Category::where('slug', 'artikel')->first();

    // Kalau tidak ditemukan, munculkan 404
    if (!$artikelCategory) {
        abort(404, 'Kategori artikel tidak ditemukan.');
    }

    // Ambil semua post yang memiliki kategori 'artikel' dan published = 1
    $artikel = $artikelCategory->posts()
        ->where('published', 1)
        ->with('media') // kalau kamu pakai Spatie Media
        ->latest()
        ->get();

    return view('post.artikel', compact('artikel'));
    }

    public function showBerita()
    {
    // Ambil kategori dengan slug 'berita'
    $beritaCategory = Category::where('slug', 'berita')->first();

    if (!$beritaCategory) {
        abort(404, 'Kategori berita tidak ditemukan.');
    }

    // Ambil semua post dalam kategori 'berita' yang dipublish
    $berita = $beritaCategory->posts()
        ->where('published', 1)
        ->with('media')
        ->latest()
        ->get();

    return view('post.berita', compact('berita'));
    }

    public function penulis()
    {
        $post = Post::where('slug', 'penulis')->firstOrFail();
        return view('post.penulis', compact('post'));
    }
}