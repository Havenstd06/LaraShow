@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div id="popular">
        <h2 class="text-2xl font-bold tracking-wider text-gray-900">Films populaires</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($populaires as $film)
                <x-films-card :film="$film"/>
            @endforeach
        </div>
    </div>
    <hr class="my-6">
    <div id="nowPlaying">
        <h2 class="mt-4 text-2xl font-bold tracking-wider text-gray-900">Films actuellement en salles</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($enSalles as $film)
            <x-films-card :film="$film"/>
            @endforeach
        </div>
    </div>
</div>
@endsection
