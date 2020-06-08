<div class="my-5">
    <a href="{{ route('films.show', ['film' => $film['id']]) }}">
        <img src="{{ 'https://image.tmdb.org/t/p/w500/' . $film['poster_path'] }}" alt="Affiche" class="duration-150 ease-in transform rounded hover:opacity-75">
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
                {{ $film['vote_average'] ? $film['vote_average'] . '/10' : 'NR' }}
            </span>
            <span class="pl-2 text-sm font-medium text-gray-800 border-l-2 border-gray-900">
                {{ \Carbon\Carbon::parse($film['release_date'])->format('d M, Y') }}
            </span>
        </div>
        <div class="flex items-center">
            <span class="text-sm font-medium text-gray-600 truncate">
                @foreach ($film['genre_ids'] as $genre)
                    {{ $genres->get($genre) }}@if (!$loop->last), @endif
                @endforeach
            </span>
        </div>
    </div>
</div>