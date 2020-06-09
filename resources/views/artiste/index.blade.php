@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h2 class="text-2xl font-bold tracking-wider text-gray-900">Artistes</h2>
    <div class="grid grid-cols-1 gap-8 artistes sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-5">
        @foreach ($populaires as $artiste)
            <div class="my-2 artiste">
                <a href="{{ route('artistes.show', ['artiste' => $artiste['id']]) }}">
                    <img src="{{ $artiste['profile_path'] }}" alt="{{ $artiste['name'] }}" class="w-full duration-150 ease-in transform hover:opacity-75">
                </a>
                <div class="mt-2">
                    <a href="#" class="mr-2 text-lg font-semibold text-gray-800 uppercase truncate hover:text-gray-700" title="{{ $artiste['name'] }}">
                        {{ $artiste['name'] }}
                    </a>
                    <div class="flex items-center">
                        <span class="text-sm font-medium text-gray-600 truncate" title="{{ $artiste['known_for'] }}">
                            {{ $artiste['known_for'] }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="flex justify-between mt-16 font-bold">
        @if ($previous)
            <a href="/artistes/page/{{ $previous }}">Previous</a>
        @else
            <div></div>
        @endif
        @if ($next)
            <a href="/artistes/page/{{ $next }}">Next</a>
        @else
            <div></div>
        @endif
    </div>
</div>
@endsection
