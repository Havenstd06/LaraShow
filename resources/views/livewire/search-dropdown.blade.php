<div class="flex justify-between flex-1 px-4">
    <div class="flex flex-1">
        <div class="flex w-full md:ml-0">
            <label for="search" class="sr-only">Recherche
            </label>
            <div class="relative w-full text-gray-400 focus-within:text-gray-600" x-data="{ isOpen: true }" @click.away="isOpen = false">
                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"></path>
                    </svg>
                </div>
                <input wire:model="search" type="text" class="block w-full h-full py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 rounded-md focus:outline-none focus:placeholder-gray-400 sm:text-sm" placeholder="Rechercher un film / série / artiste (/ pour focus)"
                x-ref="search"
                @keydown.window="
                    if (event.keyCode === 191) {
                        event.preventDefault();
                        $refs.search.focus();
                    }
                "
                @focus="isOpen = true"
                @keydown="isOpen = true"
                @keydown.escape.window="isOpen = false"
                @keydown.shift.tab="isOpen = false">
                <div wire:loading class="top-0 right-0 mt-8 mr-7 spinner"></div>
                @if (strlen($search) >= 2)
                    <div class="absolute z-50 w-full mt-2 mr-2 text-gray-900 bg-white rounded md:w-2/5 md:ml-0" x-show="isOpen">
                        @if ($searchResults->count() > 0)
                        <ul>
                            @foreach ($searchResults as $result)
                                <li class="transition duration-150 ease-in-out border-b border-gray-300 hover:bg-gray-50">
                                @if ($result['media_type'] == 'movie')
                                    <a href="{{ route('films.show', $result['id']) }}" class="flex items-center w-full px-3 py-2 transition duration-150 ease-in-out">
                                        @if ($result['poster_path'])
                                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-12 py-2 mr-3">
                                        @else
                                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-12 py-2 mr-3">
                                        @endif
                                        {{ $result['title'] }} (Film)
                                    </a>
                                @elseif ($result['media_type'] == 'tv')
                                    <a href="#" class="flex items-center w-full px-3 py-2 transition duration-150 ease-in-out">
                                        @if ($result['poster_path'])
                                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['poster_path'] }}" alt="poster" class="w-12 py-2 mr-3">
                                        @else
                                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-12 py-2 mr-3">
                                        @endif
                                        {{ $result['name'] }} (Série)
                                    </a>
                                @elseif ($result['media_type'] == 'person')
                                    <a href="#" class="flex items-center w-full px-3 py-2 transition duration-150 ease-in-out">
                                        @if ($result['profile_path'])
                                            <img src="https://image.tmdb.org/t/p/w92/{{ $result['profile_path'] }}" alt="poster" class="w-12 py-2 mr-3">
                                        @else
                                            <img src="https://via.placeholder.com/50x75" alt="poster" class="w-12 py-2 mr-3">
                                        @endif
                                        {{ $result['name'] }} (Artiste)
                                    </a>
                                @endif
                                </li>
                            @endforeach
                        </ul>
                        @else
                            <div class="px-3 py-3">Pas de resultat pour "{{ $search }}"</div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>