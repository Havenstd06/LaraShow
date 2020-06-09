@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div id="populaire">
        <h2 class="text-2xl font-bold tracking-wider text-gray-900">Séries populaires</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($populaires as $serie)
                <x-series-card :serie="$serie"/>
            @endforeach
        </div>
    </div>
    <hr class="my-6">
    <div id="note">
        <h2 class="mt-4 text-2xl font-bold tracking-wider text-gray-900">Séries les mieux notées</h2>
        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
            @foreach ($notes as $serie)
                <x-series-card :serie="$serie"/>
            @endforeach
        </div>
    </div>
</div>
@endsection
