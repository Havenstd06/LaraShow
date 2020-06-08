@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-5 lg:mt-16">
    <div class="items-center lg:flex">
      <div class="flex-none">
        @if ($film['poster_path'])
        <img src="{{ $film['poster_path'] }}" alt="Affiche" class="w-64 rounded lg:w-96">
        @else
        <img src="https://via.placeholder.com/500x750" alt="Affiche" class="w-64 rounded lg:w-96">
        @endif
      </div>
      <div class="mt-10 lg:ml-20 lg:mt-0">
        <h2 class="text-3xl font-bold tracking-wider text-gray-900" title="{{ $film['title'] }}">
          {{ $film['title'] }}
        </h2>
        <div class="flex items-center">
            <img src="https://limg.app/i/HomelyHoopoe-AustralianVegetarianSchool-4UDdt8.png" alt="Étoile" class="mr-2">
            <span class="mr-2 font-medium text-gray-800">
              {{ $film['vote_average'] }}
            </span>
            <span class="pl-2 font-medium text-gray-800 border-l-2 border-gray-900">
              {{ $film['release_date'] }}
            </span>
            <span class="pl-2 ml-2 font-medium text-gray-800 border-l-2 border-gray-900">
              {{ $film['runtime'] }}
            </span>
        </div>
        <div class="text-sm font-medium">
          <span class="text-gray-600">Genre</span>
            {{ $film['genres'] }}
        </div>
        <div class="text-sm font-medium">
          <span class="text-gray-600">De</span>
          @foreach ($film['director'] as $crew)
              {{ $crew['name'] }}
          @endforeach
        </div>
        <div class="text-sm font-medium">
          <span class="text-gray-600">Avec</span>
          @foreach ($film['castText'] as $cast)
              <a href="#">{{ $cast['name'] }}</a>@if (!$loop->last), @endif
          @endforeach
        </div>
        <div class="text-sm font-medium">
          <span class="text-gray-600">Langues</span>
          @foreach ($film['spoken_languages'] as $lang)
              {{ $lang['name'] }}@if (!$loop->last), @endif
          @endforeach
        </div>
        <div class="mt-10">
          <p>{{ $film['overview'] }}</p>
        </div>
        @if (count($film['videos']['results']) > 0)
          <div x-data="{ open: false }" class="z-50">
              <span class="inline-flex mt-10 rounded-md shadow-sm">
                <button @click="open = true" type="button" class="inline-flex items-center px-4 py-2 text-base font-medium leading-6 text-white transition duration-150 ease-in-out bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700">
                  <i class="mr-2 far fa-play-circle fa-2x"></i>
                  Play Trailer
                </button>
              </span>

            <div class="z-50" x-show="open">
              <div x-show="open" x-description="Background overlay, show/hide based on modal state." x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
              </div>
              <div class="fixed top-0 left-0 z-50 flex items-center w-full h-full overflow-y-auto shadow-lg">
                  <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
                      <div class="rounded bg-gray-50" @keydown.escape.window="open = false" @click.away="open = false" >
                          <div class="relative overflow-hidden responsive-container" style="padding-top: 56.25%">
                              <iframe class="absolute top-0 left-0 w-full h-full responsive-iframe" src="https://www.youtube.com/embed/{{ $film['videos']['results'][0]['key'] }}" style="border:0;" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
          </div>
        @endif
      </div>
    </div>
</div>
<hr class="my-10">
<div class="container z-10 mx-auto">
  <h2 class="text-2xl font-bold tracking-wider text-gray-900">Acteurs</h2>
  <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
    @foreach ($film['castImage'] as $cast)
      <div class="mt-5">
        <a href="#">
          @if ($cast['profile_path'])
          <img src="{{ 'https://image.tmdb.org/t/p/w300/' . $cast['profile_path'] }}" alt="{{ $cast['name'] }}" class="z-10 duration-150 ease-in transform rounded hover:opacity-75">
          @else
          <img src="https://via.placeholder.com/300x450" class="z-10 duration-150 ease-in transform rounded hover:opacity-75">
          @endif
          <h3 class="mt-1 text-lg font-medium text-gray-800">{{ $cast['name'] }}</h3>
          <h4 class="text-gray-800">{{ $cast['character'] }}</h4>
        </a>
      </div>
    @endforeach
  </div>
</div>
<hr class="my-10">
<div class="container mx-auto mb-5" x-data="{ open: false, image: '' }">
  <h2 class="text-2xl font-bold tracking-wider text-gray-900">Images</h2>
  <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
    @foreach ($film['images'] as $image)
      <div class="mt-5 cursor-pointer" 
        @click.prevent="
        open = true 
        image='{{ 'https://image.tmdb.org/t/p/original/' . $image['file_path'] }}'">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $image['file_path'] }}" class="duration-150 ease-in transform hover:opacity-75">
      </div>
    @endforeach
  </div>
  <div class="z-50" x-show="open">
    <div x-show="open" x-description="Background overlay, show/hide based on modal state." x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-30 transition-opacity">
      <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
    </div>
    <div class="fixed top-0 left-0 z-50 flex items-center w-full h-full overflow-y-auto shadow-lg">
        <div class="container mx-auto overflow-y-auto rounded-lg lg:px-32">
            <div class="rounded bg-gray-50" @keydown.escape.window="open = false" @click.away="open = false" >
                <div class="relative h-full overflow-hidden responsive-container">
                  <button @click="open = false" class="absolute right-0 mt-3 mr-3 bg-gray-900 rounded-full text-gray-50 focus:outline-none">
                    <i class="p-2 fas fa-times fa-lg"></i>
                  </button>
                    <img :src="image" alt="poster">
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection
