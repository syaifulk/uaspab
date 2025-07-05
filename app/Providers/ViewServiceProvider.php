<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\Tag;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
    // Ambil kategori berdasarkan jumlah postingan terbanyak
    $categories = Category::withCount('posts')
        ->orderByDesc('posts_count')
        ->limit(5)
        ->get();

    // Ambil tag berdasarkan jumlah postingan terbanyak
    $tags = Tag::withCount('posts')
        ->orderByDesc('posts_count')
        ->limit(5)
        ->get();

    // Kirim ke semua view
    View::composer('*', function ($view) use ($categories, $tags) {
        $view->with('categories', $categories);
        $view->with('tags', $tags);
    });
    }
}