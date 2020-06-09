@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-16">
    <div class="items-center md:flex">
      <div class="flex-none">
        <img src="{{ $artiste['profile_path'] }}" alt="Affiche" class="w-64 rounded md:w-96">
        <ul class="flex items-center mt-4">
          @if ($social['facebook'])
              <li>
                  <a href="{{ $social['facebook'] }}" target="_nofollow" title="Facebook">
                      <i class="text-gray-700 hover:text-gray-900 fab fa-facebook fa-2x"></i>
                  </a>
              </li>
          @endif
          @if ($social['instagram'])
              <li class="ml-6">
                  <a href="{{ $social['instagram'] }}" target="_nofollow" title="Instagram">
                      <i class="text-gray-700 hover:text-gray-900 fab fa-instagram fa-2x"></i>
                  </a>
              </li>
          @endif
          @if ($social['twitter'])
              <li class="ml-6">
                  <a href="{{ $social['twitter'] }}" target="_nofollow" title="Twitter">
                      <i class="text-gray-700 hover:text-gray-900 fab fa-twitter fa-2x"></i>
                  </a>
              </li>
          @endif
        </ul>
      </div>
      <div class="mt-10 md:ml-20 md:mt-0">
        <h2 class="text-3xl font-bold tracking-wider text-gray-900" title="{{ $artiste['name'] }}">
          @if($artiste['gender'] == 1)
          <i class="fas fa-female"></i>
          @else
          <i class="fas fa-male"></i>
          @endif
          {{ $artiste['name'] }}
        </h2>
        <span class="mr-2 font-medium text-gray-800">
          <i class="fas fa-birthday-cake"></i> {{ $artiste['birthday'] }} ({{ $artiste['age'] }}) à {{ $artiste['place_of_birth'] }}
        </span>
        <div class="mt-10">
          <p>{{ $artiste['biography'] }}</p>
        </div>
        <div class="mt-10">
          <h2 class="mb-2 text-2xl font-bold tracking-wider text-gray-900">Connu(e) pour</h2>
          <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($knownForMovies as $film)
            <div>
              <a href="{{ $film['linkToPage'] }}">
                <img src="{{ $film['poster_path'] }}" alt="poster" class="transition duration-150 ease-in-out hover:opacity-75">
                <h2 class="mt-1 text-sm font-medium">{{ $film['title'] }}</h2>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <hr class="my-10">
    <h2 class="mb-2 text-2xl font-bold tracking-wider text-gray-900">Interprétation</h2>
    <ul class="pl-5 mt-8 leading-loose list-disc">
      @foreach ($credits as $credit)
      <li>
        {{ $credit['release_year'] }} &middot;
        <strong>
          <a href="{{ $credit['linkToPage'] }}" class="hover:underline">{{ $credit['title'] }}</a>
        </strong>
        en tant que {{ $credit['character'] }}
      </li>
      @endforeach
    </ul>
</div>
@endsection