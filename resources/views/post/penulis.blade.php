@extends('layout')
@section('content')
<section class="text-gray-600 body-font">
  <div class="container mx-auto flex px-5 py-24 items-center justify-center flex-col">
    <img class="lg:w-2/6 md:w-3/6 w-5/6 mb-10 object-cover object-center rounded-full shadow-md" 
         alt="Foto Penulis" 
         src="{{ $post->getFirstMediaUrl('featured_image') }}">
    <div class="text-center lg:w-2/3 w-full">
      <h1 class="title-font sm:text-4xl text-3xl mb-2 font-bold text-gray-900">
        {{ $post->title }}
      </h1>
      <div class="leading-relaxed text-gray-800 text-sm">
        {!! $post->content !!}
      </div>
    </div>
  </div>
</section>
@endsection