<div class="my-5">
    <a href="{{ route('films.show', ['film' => $film['id']]) }}">
        @if ($film['poster_path'])
            <img src="{{ $film['poster_path'] }}" alt="Affiche" class="duration-150 ease-in transform rounded hover:opacity-75">
        @else
            <img src="https://via.placeholder.com/500x750" alt="Affiche" class="duration-150 ease-in transform rounded hover:opacity-75">
        @endif
    </a>
    <div class="mt-2">
        <div class="flex">
            <a href="{{ route('films.show', ['film' => $film['id']]) }}" class="text-lg font-semibold text-gray-800 uppercase truncate hover:text-gray-700" title="{{ $film['title'] }}">
                {{ $film['title'] }}
            </a>
        </div>
        <div class="flex items-center">
            <img src="https://limg.app/i/HomelyHoopoe-AustralianVegetarianSchool-4UDdt8.png" alt="Étoile" class="mr-2">
            <span class="mr-2 text-sm font-medium text-gray-800">
                {{ $film['vote_average'] }}
            </span>
            <span class="pl-2 text-sm font-medium text-gray-800 border-l-2 border-gray-900">
                {{ $film['release_date'] }}
            </span>
        </div>
        <div class="flex items-center">
            <span class="text-sm font-medium text-gray-600 truncate">
                {{ $film['genres'] }}
            </span>
        </div>
    </div>
</div>