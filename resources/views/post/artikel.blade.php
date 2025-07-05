@extends('layout')
@section('content')
@foreach ($artikel as $post)
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
    <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6 md:mb-0 mb-10">
      <a href = "{{ route('post.detail', ['slug'=> $post->slug]) }}"><img class="object-cover object-center rounded" src="{{$post->getFirstMediaUrl('featured_image')}}" /></a>
    </div>
    <div id ="blog-content" class="lg:flex-grow md:w-1/2 lg:pl-24 md:pl-16 flex flex-col md:items-start md:text-left items-center text-center">
      <a href = "{{ route('post.detail', ['slug'=> $post->slug]) }}"><h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-white">{{$post->title}}</h1></a>
      <a href = "{{ route('post.detail', ['slug'=> $post->slug]) }}"><p class="mb-8 leading-relaxed">{{$post->excerpt}}</p></a>
      <div class="flex justify-center">
        <a href = "{{ route('post.detail', ['slug' => $post->slug]) }}" class="inline-flex text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Lihat Selengkapnya</a>
      </div>
    </div>
  </div>
</section>
@endforeach
@endsection