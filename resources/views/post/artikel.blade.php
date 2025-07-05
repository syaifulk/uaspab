@extends('layout')
@section('content')
@foreach ($artikel as $post)
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-4 py-8 md:flex-row flex-col items-center">
    <div class="w-full md:w-1/2 lg:w-1/3 mb-4 md:mb-0">
      <a href="{{ route('post.detail', ['slug'=> $post->slug]) }}">
        <img class="object-cover object-center rounded-md shadow-md w-full h-48" src="{{ $post->getFirstMediaUrl('featured_image') }}" alt="{{ $post->title }}" />
      </a>
    </div>
    <div class="w-full md:w-1/2 lg:w-2/3 md:pl-6">
      <a href="{{ route('post.detail', ['slug'=> $post->slug]) }}">
        <h1 class="text-xl font-semibold text-gray-900 mb-2">{{ $post->title }}</h1>
      </a>
      <a href="{{ route('post.detail', ['slug'=> $post->slug]) }}">
        <p class="text-sm text-gray-700 mb-3">{{ $post->excerpt }}</p>
      </a>
      <a href="{{ route('post.detail', ['slug' => $post->slug]) }}" class="inline-block text-white bg-indigo-500 hover:bg-indigo-600 px-4 py-2 rounded text-sm">
        Lihat Selengkapnya
      </a>
    </div>
  </div>
</section>
@endforeach
@endsection
